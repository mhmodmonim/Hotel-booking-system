<?php

namespace App;

use App\Notifications\EmployeeResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Cog\Laravel\Ban\Traits\Bannable;
use App\User;
use App\Floor;
use App\Employee;
/**
 * App\Employee
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee role($roles)
 * @mixin \Eloquent
 */


class Employee extends Authenticatable  implements BannableContract
{
    use Notifiable , HasRoles , Bannable;
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email' ,'image' ,'National_ID' , 'employee_id', 'password','LastLogin' ,'mobile'  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployeeResetPassword($token));
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function employee(){
    return $this->belongsTo(Employee::class, 'employee_id');
    }
    public function floors()
    {
        return $this->hasMany(Floor::class);
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y') ;
    }

}
