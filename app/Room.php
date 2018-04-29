<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Room extends Model
{
    protected $fillable =[
        'number',
        'capacity',
         'price',
         'image',
         'floor_id',
        'employee_id'
    ];
    public function floor(){
        return $this->belongsTo(Floor::class);
    }
    public function getpriceAttribute($val){ 
        return ($val*0.01).'$' ;    
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y') ;
    }
}