<?php

use Illuminate\Database\Seeder;
use App\Meassurement;

class MeassurementSeeder extends Seeder
{
    /**
     * Run the valuebase seeds.
     *
     * @return void
     */
    public function run()
    {
        //Dispos 1
        Meassurement::insert([
	        'device_id' => "1",
            'data_id' => "1",
	        'value' => "1234"
        ]);
        Meassurement::insert([
	        'device_id' => "1",
            'data_id' => "2",
	        'value' => "4321"
        ]);
        Meassurement::insert([
	        'device_id' => "1",
            'data_id' => "3",
	        'value' => "4234"
        ]);
        Meassurement::insert([
	        'device_id' => "1",
            'data_id' => "4",
	        'value' => "50"
        ]);

        //Dispos 2
        Meassurement::insert([
	        'device_id' => "2",
            'data_id' => "1",
	        'value' => "5824"
        ]);
        Meassurement::insert([
	        'device_id' => "2",
            'data_id' => "2",
	        'value' => "8643"
        ]);
        Meassurement::insert([
	        'device_id' => "2",
            'data_id' => "3",
	        'value' => "3241"
        ]);
        Meassurement::insert([
	        'device_id' => "2",
            'data_id' => "4",
	        'value' => "70"
        ]);
    }
}
