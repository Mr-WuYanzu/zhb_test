<?php


namespace App\Http\Controllers;


class IndexController extends Controller
{
    public function index(){
        return view('index.index');
    }

    public function details(){
        return view('index.details');
    }
}
