<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Employee
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee role($roles)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasRoles;
    protected $guard_name = 'web';

    protected $fillable = [
        'name', 'email', 'password', 'image', 'gender', 'country' , 'National_ID'
    ];


}
