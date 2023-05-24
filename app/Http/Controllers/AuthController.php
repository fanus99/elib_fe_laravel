<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function login(Request $request){
        $theUrl     = $this->base_url.'/auth/login';
        $response= Http::post($theUrl, [
            'Username'=>$request->Username,
            'Password'=>$request->Password
        ]);

        return $response;
    }
}
