<?php
class Helper{
    public static function userDefaultImage(){
        return asset('frontend/img/avatardefault.png');
    }

    public static function minPrice(){
        return floor(\App\Models\Product::min('offer_price'));
    }
    public static function maxPrice(){
        return floor(\App\Models\Product::max('offer_price'));
    }
}
