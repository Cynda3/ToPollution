<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Meassurement;
use Auth;
//Quitar cuando reciba los datos
use Faker\Generator as Faker;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all()->where('public',1);

        foreach($devices as $device){
            
            $data = [];

            $meassurement1 = Meassurement::where('device_id', $device->id)->where('data_id', 1)->latest('created_at')->get()->first();
            array_push($data, $meassurement1);

            $meassurement2 = Meassurement::where('device_id', $device->id)->where('data_id', 2)->latest('created_at')->get()->first();
            array_push($data, $meassurement2);

            $meassurement3 = Meassurement::where('device_id', $device->id)->where('data_id', 3)->latest('created_at')->get()->first();
            array_push($data, $meassurement3);

            $meassurement4 = Meassurement::where('device_id', $device->id)->where('data_id', 4)->latest('created_at')->get()->first();
            array_push($data, $meassurement4);
            
            $device->data = $data;
        }

       return view('devices.index')->with('devices', $devices);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new Device;
        $device->user_id = Auth::user()->id;
        $device->id = $request->id;
        $device->name = $request->name;
        $device->latitude = "43.32147";
        $device->longitude = "-1.985725";
        if($request->public == '1')
            $device->public = true;
        else
            $device->public = false;
        $device->save();

        return redirect()->route('devices.show', $request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);
        $cont = 'black';
        $meassurement1 = Meassurement::where('device_id', $id)->where('data_id', 1)->latest('created_at')->get()->first();
        $meassurement2 = Meassurement::where('device_id', $id)->where('data_id', 2)->latest('created_at')->get()->first();
        $meassurement3 = Meassurement::where('device_id', $id)->where('data_id', 4)->latest('created_at')->get()->first();
        if (isset($meassurement1) && isset($meassurement2) && isset($meassurement3)){
            if($meassurement1->value <= 1000 && $meassurement2->value <= 3 && $meassurement3->value <= 50)
                $cont = 'green';
            else if(($meassurement1->value > 1500) || ($meassurement2->value > 5) || ($meassurement3->value > 90))
                $cont = 'red';
            else if(($meassurement1->value > 1000 && $meassurement1->value <= 1500) || ($meassurement2->value > 3 && $meassurement2->value <= 5) || ($meassurement3->value > 50 && $meassurement3->value <= 90))
                $cont = 'yellow';
        }
        return view('devices.show', ['device' => $device, 'cont' => $cont]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);
        return view('devices.edit')->with('device', $device);
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
        //VALIDATE
        $request->validate( [
            'name' => 'required|regex:/^[A-Za-záéíóú0-9+ +\.]{0,20}$/m',
        ]);

        $messages = [
            'name.required' => 'Name field is required!',
            'name.regex' => 'Name field must be a text between 1 and 20 words!',
        ];
        //UPDATE
        $device = Device::find($id);
        // Actualizo cada parametro del device
        $device->name = $request->name;
        if($request->public == '1')
            $device->public = true;
        else
            $device->public = false;
        // Guardo los cambios
        $device->save();
        return redirect (route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);
        $device->delete();
        return redirect (route('home'));
    }
}
