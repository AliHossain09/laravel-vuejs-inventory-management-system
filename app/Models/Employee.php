<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'name', 'email', 'address', 'salary', 'joining_date', 'nid', 'image', 'shop_id'];

    public function shop() {
        return $this->belongsTo(Shop::class);
    }
}
