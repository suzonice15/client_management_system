<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected  $primaryKey='profession_id';
    protected $fillable = [
        'profession_name',
    ];
}
