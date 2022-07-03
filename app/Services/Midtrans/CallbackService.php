<?php

namespace App\Services\Midtrans;

use App\Models\Feature\Order;
use App\Services\Midtrans\Midtrans;
use Midtrans\Notification;

class CallbackService extends Midtrans
{
    public function updateOrder()
    {
        // Buat instance midtrans notification
        $notification = new Notification();
        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = Order::where('invoice_number', $order_id)->first();

        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->status = 0;
                } else {
                    $transaction->status = 1;
                }
            }
        } else if ($status == 'settlement') {
            $transaction->status = 1;
        } else if ($status == 'pending') {
            $transaction->status = 0;
        } else if ($status == 'deny') {
            $transaction->status = 4;
        } else if ($status == 'expire') {
            $transaction->status = 5;
        } else if ($status == 'cancel') {
            $transaction->status = 4;
        }

        // Simpan transaksi
        $transaction->save();
    }
}
