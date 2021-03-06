<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    public function getInfo(){
        $data = $this->query()->orderBy('sort','desc')->get();
        if($data){
            return $data->toArray();
        }
        return [];
    }
}
