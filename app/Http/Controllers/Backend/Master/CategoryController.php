<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $data['category'] = $this->category->get();
        return view('backend.master.category.index',compact('data'));
    }

    public function create()
    {
        return view('backend.master.category.create');
    }

    public function store(Request $request)
    {
        $this->category->create($request->all());
        return redirect()->route('master.category.index')->with('success',__('message.store'));
    }
}
