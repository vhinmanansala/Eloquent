<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'organisation_id',
        'role_id'
    ];
    
    public function organisation()
    {
        return $this->belongsTo('App\Organisation');
    }
}
