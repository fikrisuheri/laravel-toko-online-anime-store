<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\WebConfig;
use App\Repositories\CrudRepositories;
use App\Services\Rajaongkir\RajaongkirService;
use Illuminate\Http\Request;

class WebconfigController extends Controller
{
    protected $webConfig;
    protected $rajaongkirService;
    public function __construct(WebConfig $webConfig,RajaongkirService $rajaongkirService)
    {
        $this->webConfig = new CrudRepositories($webConfig);
        $this->rajaongkirService = $rajaongkirService;
    }

    public function shipping()
    {
        $data['setting'] = $this->webConfig->Query()->where('name','like','shipping%')->get();
        $data['provinces'] = $this->rajaongkirService->getProvince();
        return view('backend.setting.address',compact('data'));
    }
}
