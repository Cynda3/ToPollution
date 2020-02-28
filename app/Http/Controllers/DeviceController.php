<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Meassurement;
use Auth;
use Carbon\Carbon;
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
        if($device->user_id == Auth::user()->id)
        {
            return view('devices.edit')->with('device', $device);
        }
        else {
            return redirect('home');
        }
        
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

    public function historical($id)
    {
        $meassuresMonth = Meassurement::where('device_id', $id)->whereMonth('created_at', Carbon::today()->month)->get();
        
        $meses = [
            '01' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '02' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '03' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '04' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '05' => [
                'CO2' => "",
                'CO' => 0,
                'dB' => 0,
            ],
            '06' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '07' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '08' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '09' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '10' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '11' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
            '12' => [
                'CO2' => 0,
                'CO' => 0,
                'dB' => 0,
            ],
        ];
        //Enero
        $meassuresEnero1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 1)->where('data_id', 1)->get();
        $meassuresEnero2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 1)->where('data_id', 2)->get();
        $meassuresEnero3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 1)->where('data_id', 4)->get();
        if(count($meassuresEnero1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresEnero1); $i++){
                $suma += $meassuresEnero1[$i]->value;
            }
            $suma = $suma / count($meassuresEnero1);
            $meses['01']['CO2'] = $suma;
        }
        if(count($meassuresEnero2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresEnero2); $i++){
                $suma += $meassuresEnero2[$i]->value;
            }
            $suma = $suma / count($meassuresEnero2);
            $meses['01']['CO'] = $suma;
        }
        if(count($meassuresEnero3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresEnero3); $i++){
                $suma += $meassuresEnero3[$i]->value;
            }
            $suma = $suma / count($meassuresEnero3);
            $meses['01']['dB'] = $suma;
        }

        //Febrero
        $meassuresFebrero1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 2)->where('data_id', 1)->get();
        $meassuresFebrero2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 2)->where('data_id', 2)->get();
        $meassuresFebrero3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 2)->where('data_id', 4)->get();
        if(count($meassuresFebrero1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresFebrero1); $i++){
                $suma += $meassuresFebrero1[$i]->value;
            }
            $suma = $suma / count($meassuresFebrero1);
            $meses['02']['CO2'] = $suma;
        }
        if(count($meassuresFebrero2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresFebrero2); $i++){
                $suma += $meassuresFebrero2[$i]->value;
            }
            $suma = $suma / count($meassuresFebrero2);
            $meses['02']['CO'] = $suma;
        }
        if(count($meassuresFebrero3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresFebrero3); $i++){
                $suma += $meassuresFebrero3[$i]->value;
            }
            $suma = $suma / count($meassuresFebrero3);
            $meses['02']['dB'] = $suma;
        }

        //Marzo
        $meassuresMarzo1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 3)->where('data_id', 1)->get();
        $meassuresMarzo2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 3)->where('data_id', 2)->get();
        $meassuresMarzo3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 3)->where('data_id', 4)->get();
        if(count($meassuresMarzo1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresMarzo1); $i++){
                $suma += $meassuresMarzo1[$i]->value;
            }
            $suma = $suma / count($meassuresMarzo1);
            $meses['03']['CO2'] = $suma;
        }
        if(count($meassuresMarzo2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresMarzo2); $i++){
                $suma += $meassuresMarzo2[$i]->value;
            }
            $suma = $suma / count($meassuresMarzo2);
            $meses['03']['CO'] = $suma;
        }
        if(count($meassuresMarzo3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresMarzo3); $i++){
                $suma += $meassuresMarzo3[$i]->value;
            }
            $suma = $suma / count($meassuresMarzo3);
            $meses['03']['dB'] = $suma;
        }

        //Abril
        $meassuresAbril1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 4)->where('data_id', 1)->get();
        $meassuresAbril2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 4)->where('data_id', 2)->get();
        $meassuresAbril3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 4)->where('data_id', 4)->get();
        if(count($meassuresAbril1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresAbril1); $i++){
                $suma += $meassuresAbril1[$i]->value;
            }
            $suma = $suma / count($meassuresAbril1);
            $meses['04']['CO2'] = $suma;
        }
        if(count($meassuresAbril2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresAbril2); $i++){
                $suma += $meassuresAbril2[$i]->value;
            }
            $suma = $suma / count($meassuresAbril2);
            $meses['04']['CO'] = $suma;
        }
        if(count($meassuresAbril3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresAbril3); $i++){
                $suma += $meassuresAbril3[$i]->value;
            }
            $suma = $suma / count($meassuresAbril3);
            $meses['04']['dB'] = $suma;
        }

        //Mayo
        $meassuresMayo1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 5)->where('data_id', 1)->get();
        $meassuresMayo2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 5)->where('data_id', 2)->get();
        $meassuresMayo3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 5)->where('data_id', 4)->get();
        if(count($meassuresMayo1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresMayo1); $i++){
                $suma += $meassuresMayo1[$i]->value;
            }
            $suma = $suma / count($meassuresMayo1);
            $meses['05']['CO2'] = $suma;
        }
        if(count($meassuresMayo2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresMayo2); $i++){
                $suma += $meassuresMayo2[$i]->value;
            }
            $suma = $suma / count($meassuresMayo2);
            $meses['05']['CO'] = $suma;
        }
        if(count($meassuresMayo3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresMayo3); $i++){
                $suma += $meassuresMayo3[$i]->value;
            }
            $suma = $suma / count($meassuresMayo3);
            $meses['05']['dB'] = $suma;
        }

        //Junio
        $meassuresJunio1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 6)->where('data_id', 1)->get();
        $meassuresJunio2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 6)->where('data_id', 2)->get();
        $meassuresJunio3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 6)->where('data_id', 4)->get();
        if(count($meassuresJunio1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresJunio1); $i++){
                $suma += $meassuresJunio1[$i]->value;
            }
            $suma = $suma / count($meassuresJunio1);
            $meses['06']['CO2'] = $suma;
        }
        if(count($meassuresJunio2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresJunio2); $i++){
                $suma += $meassuresJunio2[$i]->value;
            }
            $suma = $suma / count($meassuresJunio2);
            $meses['06']['CO'] = $suma;
        }
        if(count($meassuresJunio3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresJunio3); $i++){
                $suma += $meassuresJunio3[$i]->value;
            }
            $suma = $suma / count($meassuresJunio3);
            $meses['06']['dB'] = $suma;
        }

        //Julio
        $meassuresJulio1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 7)->where('data_id', 1)->get();
        $meassuresJulio2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 7)->where('data_id', 2)->get();
        $meassuresJulio3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 7)->where('data_id', 4)->get();
        if(count($meassuresJulio1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresJulio1); $i++){
                $suma += $meassuresJulio1[$i]->value;
            }
            $suma = $suma / count($meassuresJulio1);
            $meses['07']['CO2'] = $suma;
        }
        if(count($meassuresJulio2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresJulio2); $i++){
                $suma += $meassuresJulio2[$i]->value;
            }
            $suma = $suma / count($meassuresJulio2);
            $meses['07']['CO2'] = $suma;
        }
        if(count($meassuresJulio3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresJulio3); $i++){
                $suma += $meassuresJulio3[$i]->value;
            }
            $suma = $suma / count($meassuresJulio3);
            $meses['07']['dB'] = $suma;
        }

        //Agosto
        $meassuresAgosto1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 8)->where('data_id', 1)->get();
        $meassuresAgosto2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 8)->where('data_id', 2)->get();
        $meassuresAgosto3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 8)->where('data_id', 4)->get();
        if(count($meassuresAgosto1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresAgosto1); $i++){
                $suma += $meassuresAgosto1[$i]->value;
            }
            $suma = $suma / count($meassuresAgosto1);
            $meses['08']['CO2'] = $suma;
        }
        if(count($meassuresAgosto2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresAgosto2); $i++){
                $suma += $meassuresAgosto2[$i]->value;
            }
            $suma = $suma / count($meassuresAgosto2);
            $meses['08']['CO'] = $suma;
        }
        if(count($meassuresAgosto3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresAgosto3); $i++){
                $suma += $meassuresAgosto3[$i]->value;
            }
            $suma = $suma / count($meassuresAgosto3);
            $meses['08']['dB'] = $suma;
        }

        //Septiembre
        $meassuresSeptiembre1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 9)->where('data_id', 1)->get();
        $meassuresSeptiembre2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 9)->where('data_id', 2)->get();
        $meassuresSeptiembre3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 9)->where('data_id', 4)->get();
        if(count($meassuresSeptiembre1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresSeptiembre1); $i++){
                $suma += $meassuresSeptiembre1[$i]->value;
            }
            $suma = $suma / count($meassuresSeptiembre1);
            $meses['09']['CO2'] = $suma;
        }
        if(count($meassuresSeptiembre2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresSeptiembre2); $i++){
                $suma += $meassuresSeptiembre2[$i]->value;
            }
            $suma = $suma / count($meassuresSeptiembre2);
            $meses['09']['CO'] = $suma;
        }
        if(count($meassuresSeptiembre3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresSeptiembre3); $i++){
                $suma += $meassuresSeptiembre3[$i]->value;
            }
            $suma = $suma / count($meassuresSeptiembre3);
            $meses['09']['dB'] = $suma;
        }

        //Octubre
        $meassuresOctubre1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 10)->where('data_id', 1)->get();
        $meassuresOctubre2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 10)->where('data_id', 2)->get();
        $meassuresOctubre3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 10)->where('data_id', 4)->get();
        if(count($meassuresOctubre1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresOctubre1); $i++){
                $suma += $meassuresOctubre1[$i]->value;
            }
            $suma = $suma / count($meassuresOctubre1);
            $meses['10']['CO2'] = $suma;
        }
        if(count($meassuresOctubre2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresOctubre2); $i++){
                $suma += $meassuresOctubre2[$i]->value;
            }
            $suma = $suma / count($meassuresOctubre2);
            $meses['10']['CO'] = $suma;
        }
        if(count($meassuresOctubre3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresOctubre3); $i++){
                $suma += $meassuresOctubre3[$i]->value;
            }
            $suma = $suma / count($meassuresOctubre3);
            $meses['10']['dB'] = $suma;
        }

        //Noviembre
        $meassuresNoviembre1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 11)->where('data_id', 1)->get();
        $meassuresNoviembre2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 11)->where('data_id', 2)->get();
        $meassuresNoviembre3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 11)->where('data_id', 4)->get();
        if(count($meassuresNoviembre1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresNoviembre1); $i++){
                $suma += $meassuresNoviembre1[$i]->value;
            }
            $suma = $suma / count($meassuresNoviembre1);
            $meses['11']['CO2'] = $suma;
        }
        if(count($meassuresNoviembre2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresNoviembre2); $i++){
                $suma += $meassuresNoviembre2[$i]->value;
            }
            $suma = $suma / count($meassuresNoviembre2);
            $meses['11']['CO'] = $suma;
        }
        if(count($meassuresNoviembre3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresNoviembre3); $i++){
                $suma += $meassuresNoviembre3[$i]->value;
            }
            $suma = $suma / count($meassuresNoviembre3);
            $meses['11']['dB'] = $suma;
        }

        //Diciembre
        $meassuresDiciembre1 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 12)->where('data_id', 1)->get();
        $meassuresDiciembre2 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 12)->where('data_id', 2)->get();
        $meassuresDiciembre3 = Meassurement::where('device_id', $id)->whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', 12)->where('data_id', 4)->get();
        if(count($meassuresDiciembre1) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresDiciembre1); $i++){
                $suma += $meassuresDiciembre1[$i]->value;
            }
            $suma = $suma / count($meassuresDiciembre1);
            $meses['12']['CO2'] = $suma;
        }
        if(count($meassuresDiciembre2) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresDiciembre2); $i++){
                $suma += $meassuresDiciembre2[$i]->value;
            }
            $suma = $suma / count($meassuresDiciembre2);
            $meses['12']['CO'] = $suma;
        }
        if(count($meassuresDiciembre3) == 0){
            
        }else{
            $suma = 0;
            for($i = 0; $i < count($meassuresDiciembre3); $i++){
                $suma += $meassuresDiciembre3[$i]->value;
            }
            $suma = $suma / count($meassuresDiciembre3);
            $meses['12']['dB'] = $suma;
        }

        return view('devices.historical',  ['meses' => $meses/*, 'cont' => $cont*/]);
    }
}
