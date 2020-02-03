<?php

namespace App\Http\Middleware;

use Closure;

class DevicePrivacity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $device)
    {
        
        foreach ($request->user()->devices as $device) {
            if ($device->user_id == $request->user()->id) {
                return $next($request);
            }
        }

        return redirect('home');
    }
}
