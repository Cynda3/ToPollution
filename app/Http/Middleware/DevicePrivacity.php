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
        $devices = Device::all();

        foreach ($devices as $device) {
            if ($device->public == false ) {
                foreach ($request->user()->devices as $device) {
                    if ($device->id == $request->route('id')) {
                        return $next($request);
                    }
                }
            }else{
            return $next($request);            
            }
        }


        return redirect('home');
    }
}
