<?php

namespace App\Controller;

use Nette\Http\RequestFactory;
use Nette\Http\Response;

class HomeController extends Controller
{
    public function index(RequestFactory $request,Response $response,$args){
        dump($request);
        dump($response);
        dump($args);exit;
    }
}