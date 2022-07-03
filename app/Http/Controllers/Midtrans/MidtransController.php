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
 
    public function receive(CallbackService $callback)
    {
        $callback->updateOrder();
    }

    public function success()
    {
        return view('midtrans.success');
    }
}
