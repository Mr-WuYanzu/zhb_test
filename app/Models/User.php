<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    public $timestamps;

    public function add($data){
        return $this->query()->insert($data);
    }
}

