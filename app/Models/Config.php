<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';
    public $timestamps;

    public function getInfo($type){
        $where = [];
        if(!empty($type)){
            $where[] = ['type','=',$type];
        }
        $data = $this->query()->where($where)->first();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    public function updateByType($type,$data){
        return $this->query()->where('type','=',$type)->update($data);
    }
}
