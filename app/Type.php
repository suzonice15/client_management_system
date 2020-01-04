<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $primaryKey = 'type_id';
    protected $fillable = [
        'type_name',
    ];
}
