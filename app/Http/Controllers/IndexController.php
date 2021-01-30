<?php


namespace App\Http\Controllers;


use App\Models\AuthCode;
use App\Models\Config;
use App\Models\Register;
use App\Models\RS;
use App\Models\Specialty;
use App\Models\User;

class IndexController extends Controller
{
    public function index(){
        $config_model = new Config();
        $data = $config_model->getInfo(1);
        return view('index.index',['img'=>$data['value']??'']);
    }

    public function details(){
        $code = request()->get('code');
        $spe_model = new Specialty();
        #专业信息
        $spe_data = $spe_model->getInfoByCode($code);
        $r_s_model = new RS();
        #报考专业关联信息
        $r_s_data = $r_s_model->getInfoBySpCode($code);
        $reg_data = [];
        if($r_s_data){
            #报考码
            $reg_codes = array_column($r_s_data,'reg_code');
            $register_model = new Register();
            #报考信息
            $reg_data = $register_model->getInfoByCodes($reg_codes);
        }
        return view('index.details',['spe_data'=>$spe_data,'reg_data'=>$reg_data]);
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
            $res = $auth_code->upd($data['id'],['phone'=>$phone,'code'=>$code,'status'=>1]);
        }else{
            $res = $auth_code->add(['phone'=>$phone,'code'=>$code]);
        }
        if($res){
            return response()->json(['code'=>200,'msg'=>'success','data'=>$code]);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    public function login(){
        $data = [
            'city' => request()->post('city'),
            'school' => request()->post('school'),
            'class' => request()->post('class'),
            'phone' => request()->post('phone'),
        ];
        if(empty($data['phone']) || empty($data['city']) || empty($data['school']) || empty($data['class'])){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $user_model = new User();
        $res = $user_model->add($data);
        if($res){
            return response()->json(['code'=>200,'msg'=>'success','data'=>$res]);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    public function getSpecialty(){
        $str = request()->get('str');
        if(empty($str)){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $specialty_model = new Specialty();
        $data = $specialty_model->getInfoByName($str);
        return response()->json(['code'=>200,'msg'=>'success','data'=>$data]);
    }
}
