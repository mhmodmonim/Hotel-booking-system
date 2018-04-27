<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function getPriceAttribute($value)
    {

        return number_format(($value /100), 2, '.', ',');
    }
}
