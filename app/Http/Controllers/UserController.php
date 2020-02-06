<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Device;
use App\Meassurement;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    $devices = Device::where('user_id', Auth::user()->id)->get();

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
        return view('users.index')->with('devices', $devices);

        /* Call to gases data */
        /*$devices = Device::where('user_id', Auth::user()->id)->get();
        return view('users.index')->with('devices', $devices); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($id);
        // Actualizo cada parametro del usuario
        $user->name = $request->name;
        $user->email = $request->email;

        // Guardo los cambios
        $user->save();

        return view('/home')->with('user', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $devices = Device::where('user_id', $id)->get();
        return view('users.show',compact('user','devices'));
    
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
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
        $request->validate([
            'name' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            'lastname' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            'age' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            'city' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            'biography' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            'password' => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|confirmed'
        ]);

        $messages = [
            'name.required' => 'Name field is required!',
            'name.regex' => 'Name field must be a text between 1 and 20 words!',
            'lastname.required' => 'Last Name field is required!',
            'lastname.regex' => 'Last Name field must be a text between 1 and 20 words!',
            'age.required' => 'Age field is required!',
            'age.regex' => 'Age field must be a text between 1 and 20 words!',
            'city.required' => 'City field is required!',
            'city.regex' => 'City field must be a text between 1 and 20 words!',
            'biography.required' => 'Biography field is required!',
            'biography.regex' => 'Biography field must be a text between 1 and 20 words!',
            'password.required' => 'password is required',
            'password.regex' => 'password must have minimun 6 chars including upper case'
        ];

        //UPDATE
        $user = User::find($id);
        // Actualizo cada parametro del usuario
        $user->name = $request->name;
        $user->password = Hash::make($request->password);


        // Guardo los cambios
        $user->save();

        return view('users.show')->with('user', $user);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect (route('welcome'));
    }
}
