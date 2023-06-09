<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function category()
    // {
    //     return $this->hasMany(Category::class);
    // }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
