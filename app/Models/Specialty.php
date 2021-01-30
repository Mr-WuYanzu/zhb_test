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
}
