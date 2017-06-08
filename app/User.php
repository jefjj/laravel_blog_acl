<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function isAdmin()
    {
        foreach ($this->roles as $r)
        {
            if($r->name === 'Admin')
            {
                return true;
            }
        }

        return false;
    }

    public function canDelete()
    {
        foreach ($this->roles as $r)
        {
            if($r->name === 'Manager' || $r->name === 'Moderator')
            {
                return true;
            }
        }

        return false;
    }

    public function hasPermission($permission)
    {
        foreach ($this->roles as $r)
        {
            foreach ($r->permissions as $p)
            {
                if($p->name === $permission)
                    return true;
            }
        }

        return false;
    }
}
