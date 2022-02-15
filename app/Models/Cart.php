<?php

namespace App\Models;

use App\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cart_product()
    {
        return $this->hasMany(CartProduct::class, 'cart_id', 'id');
    }
}
