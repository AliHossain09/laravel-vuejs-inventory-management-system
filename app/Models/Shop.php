<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

     protected $fillable = ['name', 'location', 'phone'];
    
        public function admin()
            {
                return $this->belongsTo(User::class, 'admin_id');
            }

        public function author()
            {
                return $this->belongsTo(User::class, 'author_id');
            }


}
