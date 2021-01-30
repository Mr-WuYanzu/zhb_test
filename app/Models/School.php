<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';
    public $timestamps;

    public function getInfoByIds($ids){
        $data = $this->query()->whereIn('id',$ids)->get();
        if($data){
            return $data->toArray();
        }
        return [];
    }
}
