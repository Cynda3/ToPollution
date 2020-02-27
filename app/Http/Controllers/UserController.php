<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Device;
use App\Meassurement;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Data;

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
        $user->avatar = "/images/profileIcon.jpg";
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
        $devices = Device::where('user_id', $id)->where('public', 1)->get();
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
        if($id == Auth::user()->id)
        {
            return view('users.edit')->with('user', $user);
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
        $request->validate([
            'name' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            'lastname' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            'age' => 'regex:/^[0-9]{0,2}$/m',
            'country' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            //'biography' => 'regex:/^[A-Za-záéíóú0-9+ +\.]{0,150}$/m',
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);

        $messages = [
            'name.required' => 'Name field is required!',
            'name.regex' => 'Name field must be a text between 1 and 20 words!',
            'lastname.required' => 'Last Name field is required!',
            'lastname.regex' => 'Last Name field must be a text between 1 and 20 words!',
            'age.regex' => 'Age must be a number!',
            'country.required' => 'Country field is required!',
            'country.regex' => 'Country field must be a text between 1 and 20 words!',
            'biography.regex' => 'Biography field must be a text between 1 and 20 words!',
            'password.required' => 'password is required',
            'password.regex' => 'password must have minimun 6 chars including upper case'
        ];

         // Image

        $image = $request->avatar;
        $image64 = base64_encode(file_get_contents($image));
        $curl = curl_init();

        $client_id = "ea6b6f70e1374d5";

        $token = "e12ef67319da5de1c22ed6f4b3d813f46f0f07d4";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.imgur.com/3/image",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array("image" => $image64),
            CURLOPT_HTTPHEADER => array("Authorization: Client-ID ". $client_id)
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if($err){
            echo "cURL Error #:" . $err;
        }else{
            $json = json_decode($response, true);
            $user = User::find($id);

            $user->name = $request->name;
            $user->avatar = $json['data']['link'];
            $user->lastname = $request->lastname;
            $user->biography = $request->biography;
            $user->age = $request->age;
            $user->country = $request->country;
            $user->password = Hash::make($request->password);

            $user->save();
        }

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
