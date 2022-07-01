<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\WebConfig;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class WebconfigController extends Controller
{
    protected $webConfig;

    public function __construct(WebConfig $webConfig)
    {
        $this->webConfig = new CrudRepositories($webConfig);
    }

    public function shipping()
    {
        $data['setting'] = $this->webConfig->Query()->where('name','like','shipping%')->get();
        return view('backend.setting.address',compact('data'));
    }
}
