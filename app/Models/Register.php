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
}
