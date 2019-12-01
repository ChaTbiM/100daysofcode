<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //

    public function index(){
        // $arr = [
        //     "d1"=> "cool",
        //     "d2" => 15
        // ];
        // $coolString = "This IS So Cool ?";
        // $coolText = "Still Works YaaaaY ! ";

        $services = \App\Service::all();

        return view('hello' , compact('services'));
    }
}
