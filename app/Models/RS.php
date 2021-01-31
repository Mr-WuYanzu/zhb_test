<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RS extends Model
{
    protected $table = 'r_s';
    public $timestamps;

    public function getInfoBySpCode($sp_code){
        $where = [
            ['sp_code','=',$sp_code]
        ];
        $data = $this->query()->where($where)->get();
        if($data){
            return $data->toArray();
        }
        return [];
    }

    public function getInfo($sp_code,$reg_code){
        $where = [
            ['sp_code','=',$sp_code],
            ['reg_code','=',$reg_code]
        ];
        $data = $this->query()->where($where)->first();
        if($data){
            return $data->toArray();
        }
        return [];
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
