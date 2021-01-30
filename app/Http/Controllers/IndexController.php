<?php


namespace App\Http\Controllers;


use App\Models\AuthCode;
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

    public function getAuthCode(){
        $phone = request()->get('phone');
        if(empty($phone)){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $code = random_int(1000,9999);
        $auth_code = new AuthCode();
        $data = $auth_code->getInfo($phone);
        if($data){
            $res = $auth_code->upd($data['id'],['phone'=>$phone,'code'=>$code]);
        }else{
            $res = $auth_code->add(['phone'=>$phone,'code'=>$code]);
        }
        if($res){
            return response()->json(['code'=>200,'msg'=>'success','data'=>$code]);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }
}
