<?php

namespace App\Http\Controllers\Backend\Feature;

use App\Http\Controllers\Controller;
use App\Models\Feature\Order;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class OrderController extends Controller
{   
    protected $order;
    public function __construct(Order $order)
    {
        $this->order = new CrudRepositories($order);
    }

    public function index($status = null)
    {
        if($status == null){
            $data['order'] = $this->order->get();
        }else{
            $data['order'] = $this->order->Query()->where('status',$status)->get();
        }
        return view('backend.feature.order.index',compact('data'));
    }

    public function show($id)
    {
        $data['order'] = Order::find($id);
        return view('backend.feature.order.show',compact('data'));
    }

    public function inputResi(Request $request)
    {
        $request->merge(['status' => 2]);
        $this->order->Query()->where('invoice_number',$request->invoice_number)->first()->update($request->only('status','receipt_number'));
        return back()->with('success',__('message.order_receipt'));
    }
}
