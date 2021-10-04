<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use Notifiable;
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title', 'vendor_id', 'category_id', 'sub_category_id', 'description', 'current_price', 'old_price', 'qty'
    ];

    public function scopeSelection($query)
    {
        return $query->select('id', 'title', 'vendor_id', 'category_id', 'sub_category_id', 'description', 'current_price', 'old_price', 'qty', 'photo');
    }

    public function other_photos()
    {
        return $this->hasMany(Photo::class, 'product_id', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function main_category()
    {
        return $this->belongsTo(MainCategories::class, 'category_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategories::class, 'sub_category_id', 'id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('qty');
    }
}
