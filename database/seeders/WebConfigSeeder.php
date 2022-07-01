<?php

namespace Database\Seeders;

use App\Models\Setting\WebConfig;
use Illuminate\Database\Seeder;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TYPE[
        //     0 = TEXT,
        //     1 = TEXTAREA,
        //     2 = FILE,
        //     3 = SELECT
        // ] 

        // WEB
        WebConfig::create([
            'name'  => 'app_name',
            'label' => 'Application Name',
            'value' => 'PMB',
            'type'  => 0
        ]);

        WebConfig::create([
            'name'  => 'app_logo',
            'label' => 'Logo',
            'type'  => 2
        ]);

        WebConfig::create([
            'name'  => 'shipping_province_id',
            'label' => 'Provinsi',
            'type'  => 3
        ]);

        WebConfig::create([
            'name'  => 'shipping_city_id',
            'label' => 'Kota',
            'type'  => 3
        ]);

        WebConfig::create([
            'name'  => 'shipping_address',
            'label' => 'Alamat Lengkap',
            'type'  => 1
        ]);
        
    }
}
