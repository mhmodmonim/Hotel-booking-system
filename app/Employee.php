<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasRoles;
    protected $guard_name = 'web';

    protected $fillable = [
        'name', 'email', 'password', 'image', 'gender', 'country' , 'National_ID'
    ];


}
