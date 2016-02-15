<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrganisationRole extends Model
{
    protected $table = 'users_organisations_roles';
    
    protected $fillable = [
        'user_id',
        'organisation_id',
        'role_id'
    ];
}
