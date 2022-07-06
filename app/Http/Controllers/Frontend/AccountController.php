<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $province;

    public function __construct()
    {
       
    }

    public function index()
    {
      return 'coming soon';
    }
}
