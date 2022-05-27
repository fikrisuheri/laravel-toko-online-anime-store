<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Models\Master\Product;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = new CrudRepositories($category);
    }

    public function index()
    {
        $data['new_categories'] = $this->category->Query()->limit(5)->get();
        return view('frontend.home',compact('data'));
    }
}
