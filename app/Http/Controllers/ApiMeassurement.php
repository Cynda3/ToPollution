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
/*

    Db - decibelios.
    Co2 - dioxido de carbono.
    Co - monoxido de carbono.
    Latitud - latitud de las coordenadas gps
    Longitud - longitud de las coordenadas gps
    device _id - identificador de dispositivo que manda las mediciones
    Net - El protocolo de comunicación, será lora o sim808.

*/

        if (isset($request->dbs) && isset($request->co2) && isset($request->co) && isset($request->latitud) && isset($request->longitud) && isset($request->device_id) && isset($request->net)) {
                


            // Create a new meassurement for every data

            // Decibel meassurement

            $decibel = new Meassurement;
            $decibel->value = $request->dbs;
            $decibel->device_id = $request->device_id;
            $decibel->latitude = $request->latitud;
            $decibel->longitude = $request->longitud;
            $decibel->data_id = 4;
            $decibel->net = $request->net;

            $decibel->save();

            // Particles per milion meassurement

            // Co2
            $co2 = new Meassurement;
            $co2->value = $request->co2;
            $co2->device_id = $request->device_id;
            $co2->latitude = $request->latitud;
            $co2->longitude = $request->longitud;
            $co2->data_id = 1;
            $co2->net = $request->net;

            $co2->save();


            // co
            $co = new Meassurement;
            $co->value = $request->co;
            $co->device_id = $request->device_id;
            $co->latitude = $request->latitud;
            $co->longitude = $request->longitud;
            $co->data_id = 3;
            $co->net = $request->net;

            $co->save();


            // Device GPS update


            $device = Device::find($request->device_id);

            $device->name = $device->name;
            $device->latitude = $request->latitud;
            $device->longitude = $request->longitud;
            $device->user_id = $device->user_id;

            $device->save();


            $response = [
                'device' => $device->name,
                'co2' => $co2->value,
                'co' => $co->value,
                'decibel' => $decibel->value,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'net' => $request->net,
                'date' => $device->created_at
            ];

            return response()->json($response,200);
        }
        else {
            return response()->json("Faltan parametros",203);
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

/*

    Db - decibelios.
    Co2 - dioxido de carbono.
    Co - monoxido de carbono.
    Latitud - latitud de las coordenadas gps
    Longitud - longitud de las coordenadas gps
    device _id - identificador de dispositivo que manda las mediciones
    Net - El protocolo de comunicación, será lora o sim808.

*/

        if (isset($request->dbs) && isset($request->co2) && isset($request->co) && isset($request->latitud) && isset($request->longitud) && isset($request->device_id) && isset($request->net)) {
                


            // Create a new meassurement for every data

            // Decibel meassurement

            $decibel = new Meassurement;
            $decibel->value = $request->dbs;
            $decibel->device_id = $request->device_id;
            $decibel->latitude = $request->latitud;
            $decibel->longitude = $request->longitud;
            $decibel->data_id = 4;
            $decibel->net = $request->net;

            $decibel->save();

            // Particles per milion meassurement

            // Co2
            $co2 = new Meassurement;
            $co2->value = $request->co2;
            $co2->device_id = $request->device_id;
            $co2->latitude = $request->latitud;
            $co2->longitude = $request->longitud;
            $co2->data_id = 1;
            $co2->net = $request->net;

            $co2->save();


            // co
            $co = new Meassurement;
            $co->value = $request->co;
            $co->device_id = $request->device_id;
            $co->latitude = $request->latitud;
            $co->longitude = $request->longitud;
            $co->data_id = 3;
            $co->net = $request->net;

            $co->save();


            // Device GPS update


            $device = Device::find($request->device_id);

            $device->name = $device->name;
            $device->latitude = $request->latitud;
            $device->longitude = $request->longitud;
            $device->user_id = $device->user_id;

            $device->save();


            $response = [
                'device' => $device->name,
                'co2' => $co2->value,
                'co' => $co->value,
                'decibel' => $decibel->value,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'net' => $request->net,
                'date' => $device->created_at
            ];

            return response()->json($response,200);
        }
        else {
            return response()->json("Faltan parametros",203);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = [];
        $meassurement = Meassurement::where('device_id', $id)->where('data_id', 1)->latest('created_at')->get()->first();
        array_push($datos, $meassurement);
        $meassurement = Meassurement::where('device_id', $id)->where('data_id', 2)->latest('created_at')->get()->first();
        array_push($datos, $meassurement);
        /*$meassurement = Meassurement::where('device_id', $id)->where('data_id', 3)->latest('created_at')->get()->first();
        array_push($datos, $meassurement);*/
        $meassurement = Meassurement::where('device_id', $id)->where('data_id', 4)->latest('created_at')->get()->first();
        array_push($datos, $meassurement);
        
        return $datos;
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

    public function dia($id, /*$tipo,*/ $fecha)
    {
        $meassurements = Meassurement::where('device_id', $id)
                                    //->where('data_id', $tipo)
                                    ->whereDate('created_at', $fecha)
                                    ->orderBy('created_at', 'asc')
                                    ->orderBy('device_id', 'asc')
                                    ->get();
        
        $info = [['dates'],['CO2'],['CO']];

        foreach($meassurements as $meassurement) {
            if (in_array($meassurement->created_at, $info[0])){
            
            }
            else
                array_push($info[0], $meassurement->created_at);
            if($meassurement->data_id == 1)
                array_push($info[1], $meassurement->value);
            if($meassurement->data_id == 2)
                array_push($info[2], $meassurement->value);
        }
        return $info;
    }
}
