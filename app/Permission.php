<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];

    public function rules()
    {
        return $this->belongsToMany('App\Role');
    }
}
