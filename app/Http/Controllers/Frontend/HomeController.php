<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Master\Product;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = new CrudRepositories($product);
    }

    public function index()
    {
        $data['new_product'] = $this->product->getPaginate(10);
        return view('frontend.home',compact('data'));
    }
}
