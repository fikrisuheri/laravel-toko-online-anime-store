<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Master\Product;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function __construct()
    {
        $this->product = new CrudRepositories(new Product());
    }

    public function show($categoriSlug,$productSlug)
    {
        $data['product'] = $this->product->Query()->where('slug',$productSlug)->first();
        return view('frontend.product.show',compact('data'));
    }
}
