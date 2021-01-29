<?php


namespace App\Http\Controllers;


use App\Models\Config;

class IndexController extends Controller
{
    public function index(){
        $config_model = new Config();
        $data = $config_model->getInfo(1);
        return view('index.index',['img'=>$data['value']??'']);
    }

    public function details(){
        return view('index.details');
    }
}
