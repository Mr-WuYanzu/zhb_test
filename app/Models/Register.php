<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
    public $timestamps;

    public function getInfoByCodes($codes){
        $data = $this->query()->whereIn('code',$codes)->get();
        if($data){
            return $data->toArray();
        }
        return [];
    }
}
