<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RS extends Model
{
    protected $table = 'r_s';
    public $timestamps;

    public function getInfoBySpCode($sp_code){
        $where = [
            ['sp_code','=',$sp_code]
        ];
        $data = $this->query()->where($where)->get();
        if($data){
            return $data->toArray();
        }
        return [];
    }
}
