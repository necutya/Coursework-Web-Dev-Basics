<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function landing(){
        return view('landing');
    }
    public function info(){
        return view('info');
    }
    public function item(){
        return view('item');
    }
    public function order(){
        return view('order');
    }
    public function catalog(){
        return view('catalog');
    }
    public function account(){
        return view('account');
    }
    public function basket(){
        return view('basket');
    }

}
