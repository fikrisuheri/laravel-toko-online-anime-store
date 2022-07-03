<?php

namespace App\Observers;

use App\Models\Feature\Order;
use App\Models\Feature\OrderTrack;

class OrderObserver
{
    public function created(Order $order)
    {
        OrderTrack::create([
            'order_id' => $order->id,
            'icon' => 'fas fa-cart-plus',
            'description' => 'message.order_track_create'
        ]);
    }

    public function updated(Order $order)
    {
        if($order->status == 1){
            OrderTrack::create([
                'order_id' => $order->id,
                'icon' => 'fas fa-money-check',
                'description' => 'message.order_track_paid'
            ]); 
        }elseif($order->status == 2){
            OrderTrack::create([
                'order_id' => $order->id,
                'icon' => 'fas fa-paper-plane',
                'description' => 'message.order_track_send'
            ]); 
        }elseif($order->status == 3){
            OrderTrack::create([
                'order_id' => $order->id,
                'icon' => 'fas fa-user-check',
                'description' => 'message.order_track_receive'
            ]); 
        }elseif($order->status == 4){
            OrderTrack::create([
                'order_id' => $order->id,
                'icon' => 'fas fa-window-close',
                'description' => 'message.order_track_cancel'
            ]); 
        }elseif($order->status == 5){
            OrderTrack::create([
                'order_id' => $order->id,
                'icon' => 'fas fa-hourglass-end',
                'description' => 'message.order_track_expired'
            ]); 
        }
    }
}
