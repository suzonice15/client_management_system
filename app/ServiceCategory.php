<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected  $primaryKey='service_category_id';
    protected $fillable = [
        'service_category_name',
    ];
    public $timestamps = false;
}
