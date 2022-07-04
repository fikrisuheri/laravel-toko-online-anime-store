<?php

namespace App\Http\Controllers\Backend;

use App\Charts\OrderCart;
use App\Http\Controllers\Controller;
use App\Models\Feature\Order;
use App\Models\Master\Product;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $chartOrder;

    public function __construct(OrderCart $chartOrder)
    {
        $this->chartOrder = $chartOrder;
    }

    public function index()
    {
        $data['total_product'] = Product::count();
        $data['total_user'] = User::count();
        $data['total_pending'] = Order::where('status',0)->whereMonth('created_at', Date('m'))->whereYear('created_at',Date('Y'))->count();
        $data['total_shipping'] = Order::where('status',2)->whereMonth('created_at', Date('m'))->whereYear('created_at',Date('Y'))->count();
        $data['total_completed'] = Order::where('status',3)->whereMonth('created_at', Date('m'))->whereYear('created_at',Date('Y'))->count();
        $data['total_order'] = $data['total_pending'] + $data['total_shipping'] + $data['total_completed'];

        $data['best_products'] = Product::with(['OrderDetails'])
        ->withSum('OrderDetails','qty')
        ->orderByDesc('order_details_sum_qty')
        ->limit(10)
        ->get();
        $data['chart'] = $this->chartOrder->build();
        return view('backend.dashboard',compact('data'));
    }
}
