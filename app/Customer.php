<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_name', 'customer_mobile', 'customer_mobile_two', 'customer_email', 'division_id', 'area_id', 'position_id', 'profession_id', 'type_id', 'customer_remark', 'customer_address', 'customer_remendar_date', 'customer_status', 'customer_view',

    ];
}
