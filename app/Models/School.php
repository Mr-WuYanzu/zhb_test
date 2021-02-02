<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';
    public $timestamps;

    public function getInfoByIds($ids){
        $data = $this->query()->whereIn('id',$ids)->get();
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

    public function getList($str = '',$c_id = '',$page_size=20){
        $where = [];
        if($str){
            $where[] = ['name','like','%'.$str.'%'];
        }
        $data  = $this->query()->where($where)->orderBy('add_time','desc')->paginate($page_size);
        return $data;
    }

    public function getInfo($c_id = ''){
        $where = [];
        if($c_id){
            $where[] = ['c_id','=',$c_id];
        }
        $data  = $this->query()->where($where)->get();
        return $data;
    }

    public function add($data){
        return $this->query()->insert($data);
    }

    public function adds($data){
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
