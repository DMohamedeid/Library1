<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'dateOfBirth',
        'gender',
        'address',
        'image',
        'phoneNumber',
        'info',
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

    public function books() {
        return $this->hasMany('App\Book');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

//Create the role of the user
    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name' , $roles)->first();
    }

    public function hasAnyRole($role){
        return null !== $this->roles()->where('name' , $role)->first();
    }

//    End of creating the roles

}
