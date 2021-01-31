<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    public $timestamps;

    public function add($data){
        return $this->query()->insertGetId($data);
    }

    public function getList($page_size=20){
        $data  = $this->query()->orderBy('add_time','desc')->paginate($page_size);
        return $data;
    }
}

