<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public function manufacturer() {
        return $this->belongsTo('App\CarManufacturer');
    }
}
