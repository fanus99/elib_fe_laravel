<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Session;

class AuthController extends BaseController
{
    public function login(Request $request){
        $Url= $this->base_url.'/auth/login';
        $response = Http::post($Url, $request);
        $data = $response->object();

        if($response->status() == 200){
            session()->put('access_token', $data->data->access_token);
            session()->put('refresh_token', $data->data->refresh_token);
            unset($data->data->access_token);
            unset($data->data->refresh_token);
            $data->data->redirect = "/home";
            $data->data->status = true;
        }

        return $data;
    }

    public function register(Request $request){
        $Url= $this->base_url.'/auth/register';
        $response = Http::post($Url, $request);
        $data = $response->object();

        if($response->status() == 201){
            $data->data->redirect = "/";
            $data->data->status = true;
        }

        return $data;
    }

    public function getallsession(){
        return session()->all();
    }

    public function refreshToken(){
        $Url= $this->base_url.'/auth/refresh-token';
        $response = Http::post($Url, [
            'access_token'=> session()->get('access_token'),
            'refresh_token'=> session()->get('access_token')
        ]);
        $data = $response->object();
        if($response->status() == 200){
            session()->put('access_token', $data->data->access_token);
            session()->put('refresh_token', $data->data->refresh_token);
        }

        return $response->status();
    }

    public function Logout(){
        session()->flush();
        return redirect()->route('loginview')->with('message', 'Session has ended, please login again');
    }

    public function guzzleGet()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://testmyapi.com');
        $response = $request->getBody();

        dd($response);
    }

    public function guzzlePost($url, $request)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->post($url, $request);
        $response = $request->send();

        dd($response);
    }

    public function guzzlePut()
    {
        $client = new \GuzzleHttp\Client();
        $url = "http://testmyapi.com/api/blog/1";
        $myBody['name'] = "Demo";
        $request = $client->put($url,  ['body'=>$myBody]);
        $response = $request->send();

        dd($response);
    }

    public function guzzleDelete()
    {
        $client = new \GuzzleHttp\Client();
        $url = "http://testmyapi.com/api/blog/1";
        $request = $client->delete($url);
        $response = $request->send();
        dd($response);
    }
}



