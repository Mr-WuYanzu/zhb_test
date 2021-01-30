<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AuthCode extends Model
{
    protected $table = 'auth_code';
    public $timestamps;

    public function add($data){
        return $this->query()->insert($data);
    }
    public function getInfo($phone){
        $data = $this->query()->where(['phone'=>$phone])->first();
        if($data){
            return $data->toArray();
        }
        return [];
    }
    public function upd($id,$data){
        return $this->query()->where('id','=',$id)->update($data);
    }
}
