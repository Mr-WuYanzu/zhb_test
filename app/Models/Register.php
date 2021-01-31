<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
    public $timestamps;

    public function getInfoByCodes($codes){
        if(empty($codes)){
            return [];
        }
        $data = $this->query()->whereIn('code',$codes)->get();
        if($data){
            return $data->toArray();
        }
        return [];
    }

    public function getInfoByCode($code){
        $data = $this->query()->where('code','=',$code)->first();
        if($data){
            return $data->toArray();
        }
        return [];
    }

    public function getInfoById($id){
        $data = $this->query()->where('id','=',$id)->first();
        if($data){
            return $data->toArray();
        }
        return [];
    }

    public function getList($str = '',$page_size=20){
        $where = [];
        if($str){
            $where[] = ['title','like','%'.$str.'%','OR'];
            $where[] = ['code','=',$str,'OR'];
        }
        $data  = $this->query()->where($where)->orderBy('add_time','desc')->paginate($page_size);
        return $data;
    }

    public function add($data){
        return $this->query()->insert($data);
    }

    public function upd($id,$data){
        return $this->query()->where('id','=',$id)->update($data);
    }

    public function del($id)
    {
        return $this->query()->where('id', '=', $id)->delete();
    }
}
