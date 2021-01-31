<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $table = 'specialty';
    public $timestamps;

    public function getInfoByName($name){
        $where = [
            ['name','like','%'.$name.'%','OR'],
            ['code','like','%'.$name.'%','OR'],
        ];
        $data = $this->query()->where('status','=',1)->where($where)->get();
        if($data){
            return $data->toArray();
        }
        return [];
    }

    public function getInfoByCode($code){
        $where = [
            ['code','=',$code]
        ];
        $data = $this->query()->where($where)->first();
        if($data){
            return $data->toArray();
        }
        return [];
    }

    public function getInfoById($id){
        $where = [
            ['id','=',$id]
        ];
        $data = $this->query()->where($where)->first();
        if($data){
            return $data->toArray();
        }
        return [];
    }

    public function getList($str = '',$page_size=20){
        $where = [];
        if($str){
            $where[] = ['name','like','%'.$str.'%','OR'];
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
