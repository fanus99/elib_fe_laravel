<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $base_url;
    public function __construct()
    {
        $base_url = config('app.guzzle_url');
    }

    public function login(Request $request){
        $theUrl     = $base_url.'/auth/login';
        $response= Http::post($theUrl, [
            'Username'=>$request->Username,
            'Password'=>$request->Password
        ]);

        return $response;
    }
}
