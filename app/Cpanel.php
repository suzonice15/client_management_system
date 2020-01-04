<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpanel extends Model
{

        protected $fillable = [
        'cpanel_domain_name', 'cpanel_user', 'cpanel_password',

    ];
}
