<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Device;
use App\Measurement;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class ApiMeasurement extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $device = new Device;

        $device->name = $request->name;
        $device->latitude = $request->latitude;
        $device->longitude = $request->longitude;
        $device->user_id = $request->user_id;

        $device->save();


        return $device;


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
        $device = Device::find($id);

        return $device;
        dd($device['attributes']);

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
