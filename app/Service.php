<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected  $primaryKey='service_id';
    protected $fillable = [
        'customer_id','service_status','service_name','service_present_price','service_renue_price','service_start_date','service_end_date','service_renue_start_date','service_renue_end_date','service_remark','service_domain_name','service_hosting_space','service_name_remark','service_name_renue_price','service_name_price',
    ];
    public $timestamps = false;
}
