<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends BaseController
{
    private $baseRoute = '/master/buku/';

    public function getAll(Request $request){
        $url= $this->base_url . $this->baseRoute;
        $response = $this->GetDataWithAuth($url);

        return  $response->object();
    }

    public function getById($id){
        $url= $this->base_url . $this->baseRoute . $id .'';
        $response = $this->GetDataWithAuth($url);

        return  $response->object();
    }

    public function create(Request $request){
        $url= $this->base_url . $this->baseRoute;
        $response = $this->PostDataWithAuth($url, $request);

        return $response->object();
    }

    public function update($id, Request $request){
        $url= $this->base_url . $this->baseRoute . $id .'';
        $response = $this->PutDataWithAuth($url, $request);

        return $response->object();
    }

    public function delete($id){
        $url= $this->base_url . $this->baseRoute . $id .'';
        $response = $this->DeleteDataWithAuth($url);

        return $response->object();
    }
}
