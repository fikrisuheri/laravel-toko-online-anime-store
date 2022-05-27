<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = new CrudRepositories($category);
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
        $upload =  $request->file('thumbnails')->store('thumbnails','public');
        $data = $request->except('thumbnails');
        $data['thumbnails'] = $upload;
        $this->category->store($data);
        return redirect()->route('master.category.index')->with('success',__('message.store'));
    }

    public function delete($id)
    {
        $this->category->softDelete($id);
        return redirect()->back()->with('success',__('message.delete'));
    }
}
