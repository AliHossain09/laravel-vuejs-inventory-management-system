<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Supplier extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'shop_id', 'name', 'email', 'phone', 'address', 'image'
    ];

    public function shop() {
        return $this->belongsTo(Shop::class);
    }
}
