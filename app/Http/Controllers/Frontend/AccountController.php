<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RajaOngkir\Province;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $province;

    public function __construct(Province $province)
    {
        $this->province = new CrudRepositories($province);
    }

    public function index()
    {
      
    }
}
