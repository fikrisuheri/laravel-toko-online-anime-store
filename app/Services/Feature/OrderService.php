<?php
namespace App\Services\Feature;

use App\Models\Feature\Order;
use App\Repositories\CrudRepositories;

class OrderService{

    protected $order;
    public function __construct(Order $order)
    {
        $this->order = new CrudRepositories($order);
    }

    public function getUserOrder($user_id)
    {
        return $this->order->Query()->where('user_id',$user_id)->orderBy('id','desc')->get();
    }

}