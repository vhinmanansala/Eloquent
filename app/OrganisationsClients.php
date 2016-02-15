<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganisationsClients extends Model
{
    protected $fillable = [
        'organisation_id',
        'client_id'
    ];
    
    public function clients()
    {
        return $this->hasMany('\App\Client');
    }
}
