<?php

namespace App\Http\Middleware;

use Closure;
use App\Device;

class DevicePrivacity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
<<<<<<< HEAD
        foreach ($request->user()->devices as $device) {
            if ($device->user_id == $request->user()->id) {
                return $next($request);
=======

        // Search for the device to show.
        $thisDevice = Device::find($request->route('id'));

        // Verify if the device is public.
        if ($thisDevice->public == false ) {
            // Is private, this device belongs to this user?
            foreach ($request->user()->devices as $device) {
                if ($device->id == $thisDevice->id) {
                    // It belongs to this user, continue.
                    return $next($request);
                }
>>>>>>> c75b694a38a67d5f7ea167623d4de5b73156381c
            }
            // It doesn't belongs to him, can't show the device.
            return redirect('home');

        }elseif($thisDevice->public == true){
            // Is public, ok, continue.
            return $next($request);            
        }


    }
}
