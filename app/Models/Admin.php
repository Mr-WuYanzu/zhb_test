<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    public $timestamps;

    public function admin_upd($id,$password){
       return $this->query()->where('id','=',$id)->update(['password'=>$password]);
    }

    public function getInfoByAccount($account){
        return $this->query()->where('account','=',$account)->first();
    }
}
