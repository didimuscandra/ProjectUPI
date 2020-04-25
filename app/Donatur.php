<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
     
    public function jenisDonatur(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->hasMany(JenisDonatur::class);
    }
}
