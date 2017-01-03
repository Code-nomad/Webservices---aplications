<?php

namespace App;

use App\Bestelling;
use App\User;
use App\Drinks;
use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    public function bestellingen()
    {
    	return $this->hasMany(App/Bestelling);
    }
}
