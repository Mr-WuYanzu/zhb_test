<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'bind';
    //

    public function getList(){
        return $this->query()->get();
    }
}
