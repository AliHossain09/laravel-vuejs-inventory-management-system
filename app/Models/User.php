<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['firstName', 'lastName', 'userName','email','password','role_id', 'role', 'image', 'starting_date'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function shops() // Admin create shops
    {
        return $this->hasMany(Shop::class, 'admin_id');
    }

    public function assignedShops() // Author assigned shop
    {
        return $this->belongsToMany(Shop::class, 'author_shop', 'author_id', 'shop_id');
    }

}
