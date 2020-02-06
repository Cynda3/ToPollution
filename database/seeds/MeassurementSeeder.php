<?php

use Illuminate\Database\Seeder;
use App\Meassurement;
use Carbon\Carbon;

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
        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "1",
            'value' => "90",
            'created_at' => Carbon::now()
        ]);
        
        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "1",
            'value' => "10",
            'created_at' => Carbon::now()
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "1",
            'value' => "70",
            'created_at' => Carbon::now()
        ]);
        
        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "2",
            'value' => "10",
            'created_at' => Carbon::now()
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "2",
            'value' => "40",
            'created_at' => Carbon::now() 
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "2",
            'value' => "20",
            'created_at' => Carbon::now()
        ]);
        /*
        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "3",
            'value' => "50",
            'created_at' => Carbon::now()
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "3",
            'value' => "20",
            'created_at' => Carbon::now()
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "3",
            'value' => "80",
            'created_at' => Carbon::now()
        ]);
        */
        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "4",
            'value' => "0",
            'created_at' => Carbon::now()
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "4",
            'value' => "20",
            'created_at' => Carbon::now()
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "4",
            'value' => "50",
            'created_at' => Carbon::now()
        ]);

        //Dispos 2
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "1",
	        'value' => "5824"
        ]);
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "2",
	        'value' => "8643"
        ]);
        /*
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "3",
	        'value' => "3241"
        ]);
        */
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "4",
	        'value' => "70"
        ]);
    }
}
