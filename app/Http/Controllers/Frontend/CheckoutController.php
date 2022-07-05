<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Cart;
use App\Models\Setting\ShippingAddress;
use App\Repositories\CrudRepositories;
use App\Services\Feature\CartService;
use App\Services\Feature\CheckoutService;
use App\Services\Rajaongkir\RajaongkirService;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    protected $rajaongkirService,$checkoutService,$cartService;
    public function __construct(RajaongkirService $rajaongkirService,CheckoutService $checkoutService,CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->rajaongkirService = $rajaongkirService;
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $data['carts'] = $this->cartService->getUserCart();
        $data['provinces'] = $this->rajaongkirService->getProvince();
        $data['shipping_address'] = ShippingAddress::first();
        return view('frontend.checkout.index',compact('data'));
    }

    public function process(Request $request)
    {
        try{
            $this->checkoutService->process($request->all());
            return redirect()->route('transaction.index')->with('success',__('message.order_success'));
        }catch(Exception $e){
            dd($e);
        }
    }
}
