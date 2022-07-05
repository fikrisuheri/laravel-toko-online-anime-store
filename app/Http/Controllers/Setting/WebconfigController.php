<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\ShippingAddress;
use App\Models\Setting\WebConfig;
use App\Repositories\CrudRepositories;
use App\Services\Rajaongkir\RajaongkirService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $data['setting'] = ShippingAddress::first();
        $data['provinces'] = $this->rajaongkirService->getProvince();
        $data['city'] = $this->rajaongkirService->getCity($data['setting']['province_id']);
        return view('backend.setting.address',compact('data'));
    }

    public function shippingUpdate(Request $request)
    {
        ShippingAddress::first()->update($request->only('city_id','province_id'));
        return back()->with('success',__('message.update'));
    }

    public function web()
    {
        try {
            $data['setting'] = WebConfig::all();
            return view('backend.setting.web', compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    public function webUpdate(Request $request)
    {
        try {
            $input = $request->all();
            foreach ($input['field'] as $key => $value) {
                if ($request->file('field.' . $key)) {
                    $cek = WebConfig::find($key);
                    if ($cek[$key] != null) {
                        File::delete('storage/' . $cek['value']);
                    }
                    $value = $request->file('field.' . $key)->store('config/web', 'public');
                    WebConfig::find($key)->update(
                        [
                            'value' => $value
                        ]
                    );
                }
                WebConfig::find($key)->update(
                    [
                        'value' => $value
                    ]
                );
            }
            return back()->with('success', __('message.update'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
