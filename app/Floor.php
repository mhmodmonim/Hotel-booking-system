<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Room;

class Floor extends Model
{
    protected $fillable= ['name'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
        }

}
