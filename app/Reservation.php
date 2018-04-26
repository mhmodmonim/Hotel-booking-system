<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function user()
    {
        return $this->hasOne(User :: class);
    }

    public function room()
    {
        return $this->hasMany(Room :: class);
    }
}
