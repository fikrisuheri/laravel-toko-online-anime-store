<?php 

namespace App\Services\Midtrans;
 
use Midtrans\Snap;
 
class CreateSnapTokenService extends Midtrans
{
    protected $order;
 
    public function __construct($order)
    {
        parent::__construct();
 
        $this->order = $order;
    }
 
    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->invoice_number,
                'gross_amount' => $this->order->total_pay,
            ],
            'customer_details' => [
                'first_name' => $this->order->Customer->name,
                'email' => $this->order->Customer->email,
                'phone' => $this->order->phone_number,
            ]
        ];

 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}