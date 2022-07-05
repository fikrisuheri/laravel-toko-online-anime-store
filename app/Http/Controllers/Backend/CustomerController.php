<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data['customer'] = User::role('user')->get();
        return view('backend.customer.index',compact('data'));
    }
}
