<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use Notifiable;

    protected $table = 'vendors';

    protected $fillable = [
        'name', 'mobile', 'category_id', 'address', 'email', 'active', 'logo'
    ];

    protected $hidden = ['category_id'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'name', 'category_id', 'mobile', 'address', 'email', 'active', 'logo');
    }


    public function category()
    {
        return $this->belongsTo('App\Models\MainCategories', 'category_id', 'id');
    }
}
