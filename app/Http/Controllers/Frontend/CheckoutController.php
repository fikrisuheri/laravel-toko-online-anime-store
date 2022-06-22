<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Cart;
use App\Repositories\CrudRepositories;
use App\Services\Rajaongkir\RajaongkirService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    protected $cart,$province;
    protected $rajaongkirService;
    public function __construct(Cart $cart,RajaongkirService $rajaongkirService)
    {
        $this->cart = new CrudRepositories($cart);
        $this->rajaongkirService = $rajaongkirService;
    }

    public function index()
    {
        $data['carts'] = $this->cart->Query()->where('user_id',auth()->user()->id)->get();
        $data['provinces'] = $this->rajaongkirService->getProvince();
        return view('frontend.checkout.index',compact('data'));
    }
}
