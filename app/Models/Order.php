<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_number', 'payment_method','payment_status','condition','sub_total', 'total_amount', 'coupon',
        'delivery_charge','first_name', 'last_name', 'email', 'phone', 'country', 'address', 'city', 'state','postcode',
        'note', 'sfirst_name', 'slast_name', 'semail', 'sphone', 'scountry', 'saddress', 'scity', 'sstate','spostcode'];
}
