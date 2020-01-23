<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Device;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $devices = Device::all();
        $users = User::all();
        return view('admin.index')->with(['users' => $users, 'devices' => $devices, 'messages' => $messages]);
    }

    /**
     * Display a listing of the users.
     *
     */

    public function listUsers()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $users = User::all();
        return view('admin.userlist')->with(['users' => $users, 'messages' => $messages]);
    }


    public function listMessages()
    {
        $messages = Contact::all();
        return view('admin.messagelist')->with(['messages' => $messages]);
    }


    public function bannedUsers()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $users = User::onlyTrashed()->get();
        return view('admin.bannedlist')->with(['users' => $users, 'messages' => $messages]);
    }


    public function banUser($id)
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $userToBan = User::withTrashed()->find($id);
        if ($userToBan->deleted_at != NULL) {
            $userToBan->forceDelete();
            $bannedUsers = User::onlyTrashed()->get();
            return view('admin.bannedlist')->with(['users' => $bannedUsers, 'messages' => $messages]);
        }
        else{
            User::where('id', $id)->delete();
            $users = User::all();
            return view('admin.userlist')->with(['users' => $users, 'messages' => $messages]);
        }
    }


    public function restoreUser($id)
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $user_recuperado = User::onlyTrashed()->find($id)->restore();
        $users = User::onlyTrashed()->get();
        return view('admin.bannedlist')->with(['users' => $users, 'messages' => $messages]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        
        $user = User::find($id);
        return view('admin.profile')->with(['user'=> $user, 'messages' => $messages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $user = User::find($id);
        return view('admin.edit')->with(['user' => $user, 'messages' => $messages]);
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
        $messages = Contact::orderBy('created_at', 'desc')->get();

        $request->validate([
            'avatar' => 'required',
            'name' => 'required|regex:/^[A-Za-záéíóú+ +]{1,20}$/m',
            'lastname' => 'regex:/^[A-Za-záéíóú+ +]{0,20}$/m',
            'biography' => 'regex:/^[A-Za-záéíóú0-9+ +\.]{0,150}$/m',
            'age' => 'regex:/^[0-9]{0,2}$/m',
            'country' => 'regex:/^[A-Za-z+ +]{0,20}$/m'
        ]);

        $errMessages = [
            'avatar.required' => 'Avatar field is required!',
            'name.required' => 'Name field is required!',
            'name.regex' => 'Name field must be a text between 1 and 20 words!',
            'lastname.regex' => 'Lastname must be a text between 0 and 20 words!',
            'biography.regex' => 'Biography must be a text between 0 and 150 words!',
            'age.regex' => 'Age must be a number!',
            'country.regex' => 'Country must be a text between 0 and 20 words!'
        ];


        // Update


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

            $user->save();
        }





        return view('admin.profile')->with(['user' => $user, 'errMessages' => $errMessages, 'messages' => $messages]);
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
