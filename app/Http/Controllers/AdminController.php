<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Data;
use App\Device;
use App\Meassurement;
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
        $devices = Device::all();
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $users = User::all();
        $meassurements = Meassurement::all();
        $nMessages = $messages->count();
        return view('admin.index')->with(['users' => $users, 'devices' => $devices, 'messages' => $messages, 'meassurements' => $meassurements, 'nMessages' => $nMessages]);
    }

    /**
     * Display a listing of the users.
     *
     */

    public function listUsers()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $users = User::where('role_id','<>',2)->get();
        $nMessages = $messages->count();
        return view('admin.userlist')->with(['users' => $users, 'messages' => $messages, 'nMessages' => $nMessages]);
    }

    public function listUsersAdmins()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $users = User::where('role_id','=',2)->get();
        $nMessages = $messages->count();
        return view('admin.userlistadmin')->with(['users' => $users, 'messages' => $messages, 'nMessages' => $nMessages]);
    }

    public function bannedUsers()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $nMessages = $messages->count();
        $users = User::onlyTrashed()->get();
        return view('admin.bannedlist')->with(['users' => $users, 'messages' => $messages, 'nMessages' => $nMessages]);
    }


    public function banUser($id)
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $userToBan = User::withTrashed()->find($id);
        $nMessages = $messages->count();
        if ($userToBan->deleted_at != NULL) {
            $userToBan->forceDelete();
            $bannedUsers = User::onlyTrashed()->get();
            return view('admin.bannedlist')->with(['users' => $bannedUsers, 'messages' => $messages, 'nMessages' => $nMessages]);
        }
        else{
            User::where('id', $id)->delete();
            $users = User::all();
            return view('admin.userlist')->with(['users' => $users, 'messages' => $messages, 'nMessages' => $nMessages]);
        }
    }


    public function restoreUser($id)
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $user_recuperado = User::onlyTrashed()->find($id)->restore();
        $users = User::onlyTrashed()->get();
        $nMessages = $messages->count();
        return view('admin.bannedlist')->with(['users' => $users, 'messages' => $messages, 'nMessages' => $nMessages]);
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
        $nMessages = $messages->count();
        $user = User::find($id);
        return view('admin.profile')->with(['user'=> $user, 'messages' => $messages, 'nMessages' => $nMessages]);
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
        $nMessages = $messages->count();
        $user = User::find($id);
        return view('admin.edit')->with(['user' => $user, 'messages' => $messages, 'nMessages' => $nMessages]);
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
        $nMessages = $messages->count();
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





        return view('admin.profile')->with(['user' => $user, 'errMessages' => $errMessages, 'messages' => $messages, 'nMessages' => $nMessages]);
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


/*

    Messages


*/



    public function listMessages()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $nMessages = $messages->count();
        return view('admin.messagelist')->with(['messages' => $messages, 'nMessages' => $nMessages]);
    }

    public function showMessage($id)
    {
        $message = Contact::find($id);
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $nMessages = $messages->count();
        return view('admin.message')->with(['messages' => $messages, 'message' => $message, 'nMessages' => $nMessages]);
    }

    public function destroyMessage($id)
    {
        $message = Contact::destroy($id);

        $messages = Contact::orderBy('created_at', 'desc')->get();
        $nMessages = $messages->count();

        return view('admin.messagelist')->with(['messages' => $messages, 'nMessages' => $nMessages]);
    }


    public function listDevicesOn()
    {
        $name = 'On';
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $nMessages = $messages->count();
        $devices = Device::whereNotNull('updated_at')->get();
        return view('admin.devices')->with(['devices' => $devices, 'messages' => $messages, 'nMessages' => $nMessages, 'name' => $name]);
    }    

    public function listDevicesOff()
    {
        $name = 'Off';
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $nMessages = $messages->count();
        $lastData = '-';
        $devices = Device::whereNull('updated_at')->get();
        return view('admin.devices')->with(['devices' => $devices, 'messages' => $messages, 'nMessages' => $nMessages, 'name' => $name, 'lastData' => $lastData]);
    }  

    public function admincreate()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        $nMessages = $messages->count();
        return view('admin.create')->with(['messages' => $messages, 'nMessages' => $nMessages]);
    }

    public function adminStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->role_id = 2;
        $user->created_at = now();
        $user->email_verified_at = now();
        $user->password = bcrypt($request->password);
        
        $user->save();

        return redirect()->route('listUsersAdmins');
    }    
}
