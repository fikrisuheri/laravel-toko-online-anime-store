<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Cart;
use App\Models\Master\Product;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;
    public function __construct(Cart $cart)
    {
        $this->cart = new CrudRepositories($cart);
    }

    public function index()
    {
        $data['carts'] = $this->cart->Query()->where('user_id',auth()->user()->id)->get();
        return view('frontend.cart.index',compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $cek = $this->cart->Query()->where(['user_id' => auth()->user()->id,'product_id' => $request->cart_product_id])->first();
            if($cek){
                $cek->qty = $cek->qty + $request->cart_qty;
                $cek->update();
            }else{
                $this->cart->store([
                    'product_id' => $request->cart_product_id,
                    'qty'        => $request->cart_qty,
                    'user_id'    => auth()->user()->id,
                ]);
            }
            return redirect()->back()->with('success',__('message.cart_success'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function delete($id)
    {
        $cart = $this->cart->softDelete($id);
        return back()->with('success',__('message.cart_delete'));
    }
}
