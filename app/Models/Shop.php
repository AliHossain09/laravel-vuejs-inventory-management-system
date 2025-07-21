<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

     protected $fillable = ['name', 'address', 'phone'];
    
     public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function authors()
    {
        return $this->belongsToMany(User::class, 'author_shop', 'shop_id', 'author_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
        


}
