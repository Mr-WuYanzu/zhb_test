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
}
