<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use App\Device;
use App\Meassurement;
  
class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware(['auth','verified']);

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $devices = Device::all();
        
        foreach($devices as $device){
            $cont = 'black';
            $meassurement1 = Meassurement::where('device_id', $device->id)->where('data_id', 1)->latest('created_at')->get()->first();
            $meassurement2 = Meassurement::where('device_id', $device->id)->where('data_id', 2)->latest('created_at')->get()->first();
            $meassurement3 = Meassurement::where('device_id', $device->id)->where('data_id', 4)->latest('created_at')->get()->first();
            
            if (isset($meassurement1) && isset($meassurement2) && isset($meassurement3)){
                if(($meassurement1->value >= 400 && $meassurement1->value <= 1000) && ($meassurement2->value >= 1 && $meassurement2->value <= 3) && ($meassurement3->value >= 25 && $meassurement3->value <= 50))
                    $cont = 'green';
                else if(($meassurement1->value > 1000 && $meassurement1->value <= 1500) || ($meassurement2->value > 3 && $meassurement2->value <= 5) || ($meassurement3->value > 50 && $meassurement3->value <= 90))
                    $cont = 'yellow';
                else if(($meassurement1->value > 1500) || ($meassurement2->value > 5) || ($meassurement3->value > 90))
                    $cont = 'red';
            }
            $device->cont = $cont;
        }
        return view('home')->with('devices', $devices);

    }

}