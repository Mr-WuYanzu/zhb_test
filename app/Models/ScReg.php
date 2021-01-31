<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ScReg extends Model
{
    protected $table = 'sc_reg';
    public $timestamps;

    public function getListByCode($code){
       $where = [
           ['reg_code','=',$code]
       ];

       $data = $this->query()->where($where)->get();
       if($data){
           return $data->toArray();
       }
       return [];
    }

    public function getListByScid($sc_id){
        $where = [
            ['sc_id','=',$sc_id]
        ];

        $data = $this->query()->where($where)->get();
        if($data){
            return $data->toArray();
        }
        return [];
    }

    public function getInfo($sc_id,$reg_code){
        $where = [
            ['sc_id','=',$sc_id],
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
