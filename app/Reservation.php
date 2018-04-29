<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $fillable = [

        'paidPrice', 'user_id', 'room_id','clientAccompanyNumber'
    ];

    public function user()
    {

        return $this->hasOne(User :: class);

    }

    public function room()
    {
        return $this->hasMany(Room :: class);

    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y') ;
    }
}
