<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected function jenis_donatur(){
        return $this->hasMany('App\JenisDonatur','id_jenisDonatur','id_jenisDonatur');
    }
}
