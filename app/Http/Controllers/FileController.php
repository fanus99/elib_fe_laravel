<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends BaseController
{
    private $baseRoute = '/master/file/';

    public function upload(Request $request){
        $url= $this->base_url . $this->baseRoute . "upload";
        $response = $this->PostImageWithAuth($url, $request);

        return $response->object();
    }
}
