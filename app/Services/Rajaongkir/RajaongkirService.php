<?php

namespace App\Services\Rajaongkir;

use Illuminate\Support\Facades\Http;

class RajaongkirService
{

    public const BASE_URL = [
        'starter' => 'https://api.rajaongkir.com/starter',
        'basic' => 'https://api.rajaongkir.com/basic',
        'pro' => 'https://pro.rajaongkir.com/api',
    ];

    protected string $url;

    protected array $config = [];

    public function __construct()
    {
        $this->config = config('rajaongkir');
        $this->url = self::BASE_URL[$this->config['package']];
        return $this;
    }

    protected function apiCall(string $urlPath, string $field = "", string $method = 'GET')
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . $urlPath,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $field,
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->config['api_key']
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $data = json_decode($response,true);
        return $data['rajaongkir']['results'];
    }

    public function getProvince()
    {
        return $this->apiCall('/province');
    }

    public function getCity($province_id)
    {
        return $this->apiCall('/city?province=' . $province_id);
    }

    public function cost()
    {  
        $field = 'origin=501&destination=114&weight=1700&courier=jne';
        return $this->apiCall('/cost',$field,'POST');
    }
}
