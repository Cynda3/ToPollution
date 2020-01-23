<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Device;
use App\Meassurement;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class ApiMeassurement extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request->db) && isset($request->ppm) && isset($request->gps) && isset($request->device_id)/* && isset($request->net)*/) {
                

            // Split PPM and GPS 

            // GPS -> latitude - longitude
            $cords = explode('_', $request->gps, 2);
            // PPM -> Co2 - O2
            $gases = explode('_', $request->ppm, 2);

            // Create a new meassurement for every data

            // Decibel meassurement

            $decibel = new Meassurement;
            $decibel->value = $request->db;
            $decibel->device_id = $request->device_id;
            $decibel->latitude = $cords[0];
            $decibel->longitude = $cords[1];
            $decibel->data_id = 4;

            $decibel->save();

            // Particles per milion meassurement

            // Co2
            $co2 = new Meassurement;
            $co2->value = $gases[0];
            $co2->device_id = $request->device_id;
            $co2->latitude = $cords[0];
            $co2->longitude = $cords[1];
            $co2->data_id = 1;

            $co2->save();

            // O2
            $o2 = new Meassurement;
            $o2->value = $gases[1];
            $o2->device_id = $request->device_id;
            $o2->latitude = $cords[0];
            $o2->longitude = $cords[1];
            $o2->data_id = 3;

            $o2->save();


            // Device GPS update


            $device = Device::find($request->device_id);

            $device->name = $device->name;
            $device->latitude = $cords[0];
            $device->longitude = $cords[1];
            $device->user_id = $device->user_id;

            $device->save();


            return dd($device.$o2.$co2.$decibel);
        }
        else {
            $devices= Device::all();
            return $devices;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $devices = Device::all();

        return $devices;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://10.14.2.81:8000',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        // Send a request to https://foo.com/api/users
        $response = $client->request('GET', '/devices/'.$id);
        */


        // $last_co2_data = Meassurement::where([['data_id', '=', 1], ['device_id', '=', $device_id]])->latest()->get();
        // $last_co_data = Meassurement::where([['data_id', '=', 2], ['device_id', '=', $device_id]])->latest()->get();
        // $last_decibel_data = Meassurement::where([['data_id', '=', 4], ['device_id', '=', $device_id]])->latest()->get();

        // $dataArray = [$last_co2_data, $last_co_data, $last_decibel_data];
        // return response()->json($dataArray);
/*
        $last_co2_data = Meassurement::where('device_id', $id)->groupBy('data_id')->having('data_id', 1)->latest()->get();
        $last_co_data = Meassurement::where('device_id', $id)->groupBy('data_id')->having('data_id', 2)->latest()->get();
        $last_decibel_data = Meassurement::where('device_id', $id)->groupBy('data_id')->having('data_id', 4)->latest()->get();
        
       
        //$dataArray = [$last_co2_data, $last_co_data, $last_decibel_data];
        //dd($last_decibel_data);
        return $last_decibel_data;
        dd($device['attributes']);
*/

        $device = Device::find($id);
        return $device->datas;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
