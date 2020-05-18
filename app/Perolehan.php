<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perolehan extends Model
{
    public function namaDonatur(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->hasMany(Donatur::class);
    }

    public function namaKegiatan(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->hasMany(Kegiatan::class);
    }
}
