<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $table = 'vendor';

    protected $fillable = [
        'name', 'mobile', 'address', 'email', 'active', 'logo', 'token', 'slug', 'verified',
    ];

    protected $hidden = ['category_id'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'name', 'mobile', 'address', 'email', 'active', 'logo');
    }

    public function category()
    {
        return $this->belongsTo(MainCategories::class, 'category_id', 'id');
    }

    public function verifyVendor()
    {
        return $this->hasOne(VerifyVendor::class, 'vendor_id', 'id');
    }
}
