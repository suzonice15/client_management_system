<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $primaryKey='area_id';
    protected $fillable = [

        'area_name','devision_id'

    ];
}
