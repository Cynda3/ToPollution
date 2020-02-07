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
            'value' => "464",
            'created_at' => '2020-02-07 08:30:00'
        ]);
        
        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "1",
            'value' => "579",
            'created_at' => '2020-02-07 08:33:30'
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "1",
            'value' => "600",
            'created_at' => '2020-02-07 08:35:00'
        ]);
        
        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "2",
            'value' => "2",
            'created_at' => '2020-02-07 08:30:00'
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "2",
            'value' => "4",
            'created_at' => '2020-02-07 08:33:30' 
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "2",
            'value' => "2",
            'created_at' => '2020-02-07 08:35:00'
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
            'value' => "30",
            'created_at' => '2020-02-07 08:30:00'
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "4",
            'value' => "45",
            'created_at' => '2020-02-07 08:33:30'
        ]);

        Meassurement::create([
	        'device_id' => "1",
            'data_id' => "4",
            'value' => "40",
            'created_at' => '2020-02-07 08:35:00'
        ]);

        //Dispos 2
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "1",
            'value' => "1452",
            'created_at' => '2020-02-07 08:59:00'
        ]);
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "1",
            'value' => "1398",
            'created_at' => '2020-02-07 09:00:30'
        ]);
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "1",
            'value' => "1434",
            'created_at' => '2020-02-07 09:02:00'
        ]);

        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "2",
            'value' => "4",
            'created_at' => '2020-02-07 08:59:00'
        ]);
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "2",
            'value' => "3",
            'created_at' => '2020-02-07 09:00:30'
        ]);
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "2",
            'value' => "3",
            'created_at' => '2020-02-07 09:02:00'
        ]);

        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "4",
            'value' => "82",
            'created_at' => '2020-02-07 08:59:00'
        ]);
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "4",
            'value' => "79",
            'created_at' => '2020-02-07 09:00:30'
        ]);
        Meassurement::create([
	        'device_id' => "2",
            'data_id' => "4",
            'value' => "83",
            'created_at' => '2020-02-07 09:02:00'
        ]);

        //Dispos 3
        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "1",
            'value' => "1800",
            'created_at' => '2020-02-07 08:59:00'
        ]);
        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "1",
            'value' => "1864",
            'created_at' => '2020-02-07 09:00:30'
        ]);
        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "1",
            'value' => "1882",
            'created_at' => '2020-02-07 09:02:00'
        ]);

        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "2",
            'value' => "6",
            'created_at' => '2020-02-07 08:59:00'
        ]);
        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "2",
            'value' => "8",
            'created_at' => '2020-02-07 09:00:30'
        ]);
        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "2",
            'value' => "6",
            'created_at' => '2020-02-07 09:02:00'
        ]);

        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "4",
            'value' => "94",
            'created_at' => '2020-02-07 08:59:00'
        ]);
        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "4",
            'value' => "108",
            'created_at' => '2020-02-07 09:00:30'
        ]);
        Meassurement::create([
	        'device_id' => "3",
            'data_id' => "4",
            'value' => "102",
            'created_at' => '2020-02-07 09:02:00'
        ]);
    }
}
