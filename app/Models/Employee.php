<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [ 'name', 'email', 'address', 'salary', 'joining_date', 'nid', 'image'];

    public function shop() {
        return $this->belongsTo(Shop::class);
    }
}
