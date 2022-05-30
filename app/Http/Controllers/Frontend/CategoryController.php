<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Models\Master\Product;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category,$product;
    public function __construct(Category $category,Product $product)
    {
        $this->category = new CrudRepositories($category);
        $this->product = new CrudRepositories($product);
    }

    public function index()
    {
        $data['category'] = $this->category->getPaginate(9);
        return view('frontend.category.index',compact('data'));
    }

    public function show($slug)
    {
        $data['category'] = $this->category->Query()->where('slug',$slug)->first();
        $data['product'] = $this->product->Query()->where('categories_id',$data['category']->id)->paginate(12);

        return view('frontend.category.show',compact('data'));
    }
}
