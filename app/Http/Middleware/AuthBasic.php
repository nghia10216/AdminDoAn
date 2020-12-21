<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
         $except = [
            'api/register',
            'api/login',

            'api/khoa',
            'api/khoa/{khoa}',

            'api/bomon',
            'api/bomon/{bomon}',

            'api/diemchuan',
            'api/diemchuan/{diemchuan}',

            'api/nganh',
            'api/nganh/{nganh}',

            'api/thongtinnganh',
            'api/thongtinnganh/{thongtinnganh}',

            'api/hinhanhnganh',
            'api/hinhanhnganh/{hinhanhnganh}',

            'api/hinhanhkhoa',
            'api/hinhanhkhoa/{hinhanhkhoa}',

            'api/donvihoptac',
            'api/donvihoptac/{donvihoptac}',
        ];

        if (in_array($request->route()->uri, $except)) {
            return $next($request);
        }

        if(Auth::onceBasic()) {
            return response()->json(['message'=>'Auth failed'], 401);
        } else {
            return $next($request);
        }
     
    }
}
