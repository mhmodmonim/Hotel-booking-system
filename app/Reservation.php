<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $table = 'reservation';
    protected $fillable = [

        'paidPrice', 'user_id', 'room_id', 'employee_id'
    ];

    public function user()
    {
<<<<<<< HEAD
        return $this->hasOne(User :: class);
=======
        return $this->belongsTo(User::class);
>>>>>>> 3c8f560770eaa2a37a83624cd4c2df1c64f122d1
    }

    public function room()
    {
<<<<<<< HEAD
        return $this->hasMany(Room :: class);
=======
        return $this->belongsTo(Room::class);
>>>>>>> 3c8f560770eaa2a37a83624cd4c2df1c64f122d1
    }
}
