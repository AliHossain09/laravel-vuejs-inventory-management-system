<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
     use HasFactory;

    protected $fillable = [
        'product_id', 'shop_id', 'status', 'image', 'products_code', 'user_id', 'type', 'stock_quantity', 'products_name', 'category_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
