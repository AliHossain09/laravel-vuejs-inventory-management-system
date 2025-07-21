<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
     use HasFactory;

    protected $fillable = [
        'products_name', 'category_id', 'supplier_id', 'shop_id',
        'unit','buying_price', 'selling_price', 'stock_quantity', 'buying_date', 'image', 'products_code'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function stockHistory()
    {
        return $this->hasMany(Stock::class);
    }
}
