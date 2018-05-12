<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarManufacturer extends Model
{
    public function carmodel() {
        return $this->hasMany('App\CarModel');
    }
}
