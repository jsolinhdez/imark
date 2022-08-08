<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'summary', 'description','additional_info','return_cancellation', 'brand_id','stock', 'price', 'offer_price', 'discount', 'condition', 'status', 'photo', 'vendor_id', 'cat_id', 'child_cat_id','size'];


    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->limit(10);
    }
    public static function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();
    }

}
