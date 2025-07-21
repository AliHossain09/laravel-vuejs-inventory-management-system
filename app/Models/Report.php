<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'data', 'report_date', 'shop_id'];

    protected $casts = [
        'data' => 'array',
        'report_date' => 'date'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
