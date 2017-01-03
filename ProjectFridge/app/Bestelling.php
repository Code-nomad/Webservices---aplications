<?php

namespace App;

use App\Bestelling;
use App\User;
use App\Drinks;
use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    // public function afgehandeld_door()
    // {
    // 	return $this->belongsTo();
    // }

    public function users()
    {
    	return $this->belongsTo(App/User);
    }

    public function drinks()
    {
    	return $this->belongsTo(App/Drinks);
    }
}
