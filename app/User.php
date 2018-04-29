<?php

namespace App;

use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Notifications\InvoicePaid;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Sheduled;
use Tymon\JWTAuth\Contracts\JWTSubject;

//<a href='"+realDeleteRoute+"' class='btn btn-danger' > decline </a>

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard_name = 'web';


    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'gender', 'country', 'image' , 'lastLogin'
        ];

    /**
     * The attributes that should be    hidden for arrays.
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
        $this->notify(new UserResetPassword($token));
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function run(){
        //$permission = Permission::create(['name' => 'Approved']);
    }

    public function sendEmailNotification($invoice)
    {
        $this->notify(new InvoicePaid($invoice));
    }

    public function sendScheduleNotification($invoice)
    {
        $this->notify(new Sheduled($invoice));
    }

    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

    public function lastLogin()
    {
        return $this->lastLogin ;
    }
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y') ;
    }
}
