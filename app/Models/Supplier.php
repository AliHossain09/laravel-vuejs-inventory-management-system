<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
     protected $fillable = [
        'shop_id', 'name', 'email', 'phone', 'address', 'image'
    ];

    public function shop() {
        return $this->belongsTo(Shop::class);
    }
}
