<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'summary', 'description', 'brand_id','stock', 'price', 'offer_price', 'discount', 'conditions', 'status', 'photo', 'vendor_id', 'cat_id', 'child_cat_id','size'];
}
