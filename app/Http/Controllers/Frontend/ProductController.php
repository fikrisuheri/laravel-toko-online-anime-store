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

    public function index()
    {
        $data['product'] = $this->product->getPaginate(12);
        return view('frontend.product.index',compact('data'));
    }

    public function show($categoriSlug,$productSlug)
    {
        $data['product'] = $this->product->Query()->where('slug',$productSlug)->first();
        $data['product_related'] = $this->product->Query()->whereNotIn('slug',[$productSlug])->limit(4)->get();
        return view('frontend.product.show',compact('data'));
    }

    public function search(Request $request)
    {
        $data['product'] = $this->product->Query()->where('name','like','%'.$request->q.'%')->paginate
        (12);

        return view('frontend.product.search',compact('data'));
    }
}
