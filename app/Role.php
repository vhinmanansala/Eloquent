<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
