<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public $base_url;
    public function __construct()
    {
        $this->base_url = config('app.guzzle_url');
    }

    public function GetDataWithAuth($url){
        return Http::withHeaders([
            'access_token' =>  session()->get('access_token'),
            'Content-Type' => 'application/json'
        ])->get($url);
    }

    public function PostDataWithAuth($url, Request $request){
        return Http::withHeaders([
            'access_token' =>  session()->get('access_token'),
            'Content-Type' => 'application/json'
        ])->post($url, $request);
    }

    public function PutDataWithAuth($url, Request $request){
        return Http::withHeaders([
            'access_token' =>  session()->get('access_token'),
            'Content-Type' => 'application/json'
        ])->put($url, $request);
    }

    public function DeleteDataWithAuth($url){
        return Http::withHeaders([
            'access_token' =>  session()->get('access_token'),
            'Content-Type' => 'application/json'
        ])->delete($url);
    }

    public function PostImageWithAuth($url, Request $request){
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        return Http::withHeaders([
            'access_token' =>  session()->get('access_token'),
        ])->attach('fileUpload', $request->file('file'),$filename)->post($url);
    }
}
