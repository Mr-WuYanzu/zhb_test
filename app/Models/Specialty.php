<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $table = 'specialty';
    public $timestamps;

    public function getInfoByName($name){
        $where = [
            ['name','like','%'.$name.'%'],
            ['status','=',1]
        ];
        $data = $this->query()->where($where)->get();
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
}
