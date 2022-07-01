<?php

namespace App\Http\Controllers\Midtrans;

use App\Http\Controllers\Controller;
use App\Models\Feature\Order;
use App\Services\Midtrans\CallbackService;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
class MidtransController extends Controller
{
    protected $serverKey;
    protected $isProduction;
    protected $isSanitized;
    protected $is3ds;
 
    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->isProduction = config('midtrans.is_production');
        $this->isSanitized = config('midtrans.is_sanitized');
        $this->is3ds = config('midtrans.is_3ds');
 
    }
    public function receive()
    {
        // Set konfigurasi midtrans
        Config::$serverKey = $this->serverKey;
        Config::$isProduction = $this->isProduction;
        Config::$isSanitized = $this->isSanitized;
        Config::$is3ds = $this->is3ds;

        // Buat instance midtrans notification
        $notification = new Notification();
        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = Order::where('invoice_number',$order_id)->first();

        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 0;
                }
                else {
                    $transaction->status = 1;
                }
            }
        }
        else if ($status == 'settlement'){
            $transaction->status = 1;
        }
        else if($status == 'pending'){
            $transaction->status = 0;
        }
        else if ($status == 'deny') {
            $transaction->status = 5;
        }
        else if ($status == 'expire') {
            $transaction->status = 5;
        }
        else if ($status == 'cancel') {
            $transaction->status = 5;
        }

        // Simpan transaksi
        $transaction->save();
    }

    public function success()
    {
        return redirect()->route('transaction.index')->with('success','Pembayaran Berhasil')
    }
}
