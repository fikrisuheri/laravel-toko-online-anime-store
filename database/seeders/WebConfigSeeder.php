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
        //     3 = SELECT, 
        // ] 

        // WEB
        WebConfig::create([
            'name'  => 'app_name',
            'label' => 'Application Name',
            'value' => 'Anime Store',
            'type'  => 0
        ]);

        WebConfig::create([
            'name'  => 'app_logo',
            'label' => 'Logo',
            'type'  => 2
        ]);
        
    }
}
