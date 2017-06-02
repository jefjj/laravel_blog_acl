<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function rules()
    {
        return $this->belongsToMany('App\Role');
    }
}
