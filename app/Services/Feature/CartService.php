<?php
namespace App\Services\Feature;

use App\Models\Feature\Cart;
use App\Repositories\CrudRepositories;
use Illuminate\Support\Str;
class CartService{

    protected $cart;
    public function __construct(Cart $cart)
    {
        $this->cart = new CrudRepositories($cart);
    }

    public function getUserCart()
    {
        return $this->cart->Query()->where('user_id',auth()->user()->id)->get();
    }
    
    public function deleteUserCart()
    {
        return $this->cart->Query()->where('user_id',auth()->user()->id)->delete();
    }

}