<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Models\Master\Product;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product,$category;
    public function __construct(Product $product,Category $category)
    {
        $this->product = new CrudRepositories($product);
        $this->category = new CrudRepositories($category);
    }

    public function index()
    {
        $data['product'] = $this->product->get();
        return view('backend.master.product.index',compact('data'));
    }

    public function create()
    {
        $data['category'] = $this->category->get();
        return view('backend.master.product.create',compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $this->product->store($data,true,['thumbnails'],'product/thumbnails');
        return redirect()->route('master.product.index')->with('success',__('message.store'));
    }
}
