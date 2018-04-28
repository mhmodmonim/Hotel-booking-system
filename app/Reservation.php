<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $table = 'reservation';
    protected $fillable = [

        'paidPrice', 'user_id', 'room_id', 'employee_id','clientAccompanyNumber'
    ];

    public function user()
    {

        return $this->hasOne(User :: class);

    }

    public function room()
    {
        return $this->hasMany(Room :: class);

    }
}
