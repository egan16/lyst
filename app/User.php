<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_roles');
    }

    // public function authorizeRoles($roles)
    // {
    //   if (is_array($roles)) {
    //     return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized'); // for array of roles
    //   }
    //   return $this->hasRole($roles) || abort(401, 'This action is unauthorized'); //for one role
    // }

    //for one role
    public function hasRole($role)
    {
      return null !== $this->roles()->where('name', $role)->first();
    }
    // //for array of roles
    // public function hasAnyRole($roles)
    // {
    //   return null !== $this->roles()->whereIn('name', $role)->first();
    // }

    public function lists()
    {
        return $this->hasMany('App\ListModel');
    }
}
