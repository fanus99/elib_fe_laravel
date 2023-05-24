<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $base_url;
    public function __construct()
    {
        $this->base_url = config('app.guzzle_url');
    }
}
