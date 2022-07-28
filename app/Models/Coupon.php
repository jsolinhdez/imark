<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'type', 'status', 'value'];

    public function discount($total)
    {
        $ent = (float)str_replace(',','',$total);
        if ($this->type == "fixed") {
            return $this->value;
        } elseif ($this->type == "percent") {
            return ($this->value / 100) * $ent;
        } else {
            return 0;
        }
    }

}
