<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(){
        return view('test',[
            'name' => 'aamir',
            'email' => 'mamir@gmail.com'
        ]);
    }
}
