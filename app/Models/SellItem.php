<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SellItem extends Model
{
     use HasFactory;

    protected $fillable = [
        'sell_id', 'product_id', 'quantity', 'unit_price', 'subtotal'
    ];

    public function sell()
    {
        return $this->belongsTo(Sell::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
