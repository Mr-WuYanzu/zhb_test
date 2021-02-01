<?php


namespace App\Http\Controllers\Admin\controller;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Config;
use App\Models\Register;
use App\Models\RS;
use App\Models\School;
use App\Models\ScReg;
use App\Models\Specialty;
use App\Models\User;

class Index extends Controller
{
    public function index(){
        return view('admin.index',['account' => request()->_account]);
    }

    public function loginView(){
        return view('admin.login');
    }

    #用户登录
    public function login(){
        $data = [
            'account' => request()->post('account'),
            'password' => request()->post('password')
        ];
        if(empty($data['account']) || empty($data['password'])){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $admin_model = new Admin();
        $resdata = $admin_model->getInfoByAccount($data['account']);
        if(!$resdata){
            return response()->json(['code'=>1000,'msg'=>'账户不存在']);
        }
        if($resdata['password'] != md5($data['password'])){
            return response()->json(['code'=>1000,'msg'=>'密码错误']);
        }
        unset($resdata['password']);
        setcookie('login',json_encode($resdata),time()+86400,'/');
        return response()->json(['code'=>200,'msg'=>'登录成功']);
    }

    #用户列表
    public function user_list(){
        $user_model = new User();
        $user_list = $user_model->getList();
        return view('admin.user',['data'=>$user_list]);
    }

    #专业列表
    public function specialty_list(){
        $str = request()->get('str');
        $spe_model = new Specialty();
        $data = $spe_model->getList($str);
        return view('admin.spe_list',['data'=>$data,'str'=>$str]);
    }

    #专业添加页面
    public function spe_add(){
        $id = request()->get('id');
        $spe_model = new Specialty();
        $data = $spe_model->getInfoById($id);
        return view('admin.spe_add',['data'=>$data]);
    }

    #专业添加执行
    public function spe_add_do(){
        $data = [
            'name'=>request()->post('name'),
            'code'=>request()->post('code'),
        ];
        $id = request()->post('id');
        if(empty($data['name']) || empty($data['code'])){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $spe_model = new Specialty();
        $res = $spe_model->getInfoByCode($data['code']);
        if($res){
            return response()->json(['code'=>1000,'msg'=>'代码重复']);
        }
        if($id){
            $res = $spe_model->upd($id,$data);
        }else{
            $data['add_time'] = time();
            $res = $spe_model->add($data);
        }
        if($res != false){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #专业删除
    public function spe_del(){
        $id = request()->get('id');
        if(empty($id)){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $spe_model = new Specialty();
        $res = $spe_model->del($id);
        if($res){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #报考列表
    public function reg_list(){
        $str = request()->get('str');
        $reg_model = new Register();
        $data = $reg_model->getList($str);
        return view('admin.reg_list',['data'=>$data,'str'=>$str]);
    }

    #报考添加页面
    public function reg_add(){
        $id = request()->get('id');
        $reg_model = new Register();
        $data = $reg_model->getInfoById($id);
        return view('admin.reg_add',['data'=>$data]);
    }

    #报考添加执行
    public function reg_add_do(){
        $data = [
            'title'=>request()->post('title'),
            'code'=>request()->post('code'),
        ];
        $id = request()->post('id');
        if(empty($data['title']) || empty($data['code'])){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $reg_model = new Register();
        $res = $reg_model->getInfoByCode($data['code']);
        if($res){
            return response()->json(['code'=>1000,'msg'=>'代码重复']);
        }
        if($id){
            $res = $reg_model->upd($id,$data);
        }else{
            $data['add_time'] = time();
            $res = $reg_model->add($data);
        }
        if($res != false){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #报考删除
    public function reg_del(){
        $id = request()->get('id');
        if(empty($id)){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $reg_model = new Register();
        $res = $reg_model->del($id);
        if($res){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #院校列表
    public function school_list(){
        $str = request()->get('str');
        $school_model = new School();
        $data = $school_model->getList($str);
        return view('admin.school_list',['data'=>$data,'str'=>$str]);
    }

    #院校添加页面
    public function school_add(){
        $id = request()->get('id');
        $school_model = new School();
        $data = $school_model->getInfoById($id);
        return view('admin.school_add',['data'=>$data]);
    }

    #院校添加执行
    public function school_add_do(){
        $data = [
            'name'=>request()->post('name'),
        ];
        $id = request()->post('id');
        if(empty($data['name'])){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $school_model = new School();
        if($id){
            $res = $school_model->upd($id,$data);
        }else{
            $data['add_time'] = time();
            $res = $school_model->add($data);
        }
        if($res != false){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #院校删除
    public function school_del(){
        $id = request()->get('id');
        if(empty($id)){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $school_model = new School();
        $res = $school_model->del($id);
        if($res){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    public function password_add(){
        return view('admin.admin_add');
    }

    #修改后台账号密码
    public function password_add_do(){
        $admin_model = new Admin();
        $password = request()->post('password');
        if(empty($password)){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }

        $res = $admin_model->admin_upd(request()->_id,md5($password));
        if($res !== false){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #专业报考信息
    public function check_reg(){
        $code = request()->get('code'); #专业代码
        $r_s_model = new RS();
        $data = $r_s_model->getInfoBySpCode($code);
        if($data){
            $reg_code = array_column($data,'reg_code');
            $reg_model = new Register();
            $reg_data = $reg_model->getInfoByCodes($reg_code);
            $reg_codes = array_column($reg_data,'code','code');
            $reg_title = array_column($reg_data,'title','code');
            foreach ($data as $k=>$v){
                $data[$k]['reg_code'] = $reg_codes[$v['reg_code']]??'';
                $data[$k]['reg_title'] = $reg_title[$v['reg_code']]??'';
            }
        }
        return view('admin.check_reg',['data'=>$data,'spe_code'=>$code]);
    }

    #专业报考关联信息删除
    public function check_reg_del(){
        $id = request()->get('id');
        if(empty($id)){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $r_s_model = new RS();
        $res = $r_s_model->del($id);
        if($res){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #专业报考信息关联
    public function link_reg(){
        $spe_code = request()->get('spe_code');
        return view('admin.link_reg',['spe_code'=>$spe_code]);
    }

    #专业报考信息关联添加
    public function link_reg_add(){
        $data = [
            'reg_code'=> request()->post('reg_code'),
            'sp_code' => request()->post('sp_code'),
        ];
        $id = request()->post('id');
        if(empty($data['reg_code']) || empty($data['sp_code'])){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $reg_model  = new Register();
        $res = $reg_model->getInfoByCode($data['reg_code']);
        if(!$res){
            return response()->json(['code'=>1000,'msg'=>'报考代码错误']);
        }
        $rs_model = new RS();
        $res = $rs_model->getInfo($data['sp_code'],$data['reg_code']);
        if($res){
            return response()->json(['code'=>1000,'msg'=>'已经关联过了']);
        }
        if($id){
            $res = $rs_model->upd($id,$data);
        }else{
            $res = $rs_model->add($data);
        }
        if($res != false){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #院校招生专业报考信息
    public function school_check_reg(){
        $sc_id = request()->get('sc_id'); #院校id
        $sc_reg_model = new ScReg();
        $data = $sc_reg_model->getListByScid($sc_id);
        if($data){
            $reg_code = array_column($data,'reg_code');
            $reg_model = new Register();
            $reg_data = $reg_model->getInfoByCodes($reg_code);
            $reg_codes = array_column($reg_data,'code','code');
            $reg_title = array_column($reg_data,'title','code');
            foreach ($data as $k=>$v){
                $data[$k]['reg_code'] = $reg_codes[$v['reg_code']]??'';
                $data[$k]['reg_title'] = $reg_title[$v['reg_code']]??'';
            }
        }
        return view('admin.school_check_reg',['data'=>$data,'sc_id'=>$sc_id]);
    }

    #院校招生专业报考关联信息删除
    public function school_check_reg_del(){
        $id = request()->get('id');
        if(empty($id)){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $sc_reg_model = new ScReg();
        $res = $sc_reg_model->del($id);
        if($res){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    #院校招生专业报考信息关联
    public function school_link_reg(){
        $sc_id = request()->get('sc_id');
        return view('admin.school_link_reg',['sc_id'=>$sc_id]);
    }

    #院校招生专业报考信息关联添加
    public function school_link_reg_add(){
        $data = [
            'reg_code'=> request()->post('reg_code'),
            'sc_id' => request()->post('sc_id'),
            'num' => request()->post('num')
        ];
        $id = request()->post('id');
        if(empty($data['reg_code']) || empty($data['sc_id'])){
            return response()->json(['code'=>1000,'msg'=>'参数错误']);
        }
        $reg_model  = new Register();
        $res = $reg_model->getInfoByCode($data['reg_code']);
        if(!$res){
            return response()->json(['code'=>1000,'msg'=>'报考代码错误']);
        }
        $sc_reg_model = new ScReg();
        $res = $sc_reg_model->getInfo($data['sc_id'],$data['reg_code']);
        if($res){
            return response()->json(['code'=>1000,'msg'=>'已经关联过了']);
        }
        if($id){
            $res = $sc_reg_model->upd($id,$data);
        }else{
            $res = $sc_reg_model->add($data);
        }
        if($res != false){
            return response()->json(['code'=>200,'msg'=>'成功']);
        }else{
            return response()->json(['code'=>1000,'msg'=>'系统错误']);
        }
    }

    /**
     * 修改背景图片页面
     */
    public function backGroundImg(){
        $config_model = new Config();
        $data = $config_model->getInfo(1);
        return view('admin.background_add',['img'=>$data['value']??'']);
    }

    /**
     * 图片上传
     */
    public function upload_img(){
        $file = $_FILES['file'];
        if(empty($file)){
            return response()->json(['code'=>1000,'msg'=>'请选择文件上传']);
        }
        $type = explode('/',$file['type'])[1]??'png';
        $content = file_get_contents($file['tmp_name']);
        $file_name = md5(microtime()).'.'.$type;
        $data = file_put_contents(__DIR__.'/../../../../../public/images/'.$file_name,$content);
        if($data){
            $config_model = new Config();
            $res = $config_model->updateByType(1,['value'=>'/images/'.$file_name]);
            if($res){
                return response()->json(['code'=>200,'msg'=>'上传成功']);
            }
        }
        return response()->json(['code'=>1000,'msg'=>'系统错误']);
    }
}
