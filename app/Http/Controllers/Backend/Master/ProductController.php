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

    public function show($id)
    {
        $data['product'] = $this->product->find($id);
        return view('backend.master.product.show',compact('data'));
    }

    public function edit($id)
    {
        $data['product'] = $this->product->find($id);
        $data['category'] = $this->category->get();
        return view('backend.master.product.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        if(isset($request->thumbnails)){
            $this->product->update($id,$request->all('_token'),true,['thumbnails'],'product/thumbnails');
        }else{
            $this->product->update($id,$request->except('_token'));
        }
        return redirect()->route('master.product.index')->with('success',__('message.store'));
    }

    public function delete($id)
    {
        $this->product->hardDelete($id);
        return back()->with('success',__('message.harddelete'));
    }
}
