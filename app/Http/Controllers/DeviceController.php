<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
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
        return redirect('home');
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
    public function store(Request $request, Faker $faker)//Quitar faker cuando reciba valores
    {
        $device = new Device;
        $device->user_id = Auth::user()->id;
        $device->id = $request->id;
        $device->public = $request->example;
        $device->name = $request->name;
        $device->latitude = " - ";
        $device->longitude = " - ";

        $device->save();
        return view('devices.show')->with('device', $device);
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
        return view('devices.show')->with('device', $device);
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
            'name' => 'required|name',
        ]);
        
        $messages = [
            'name.required' => 'Name is required!',
        ];
        //UPDATE
        $device = Device::find($id);
        // Actualizo cada parametro del device
        $device->name = $request->name;
        
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
