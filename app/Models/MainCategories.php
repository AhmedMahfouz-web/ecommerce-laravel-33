<?php

namespace App\Models;

use App\Observers\MainCategoriesObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'translation_lang', 'translation_of', 'name', 'slug', 'photo', 'active',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'translation_lang', 'name', 'photo', 'slug', 'active', 'translation_of');
    }

    public function language()
    {
        return $this->belongsTo(Languages::class, 'translation_lang', 'abbr');
    }

    public function categories()
    {
        return $this->hasMany(self::class, 'translation_of', 'id');
    }

    public function main_category()
    {
        return $this->belongsTo(self::class, 'translation_of', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategories::class, 'category_id', 'id');
    }

    public function sub_sub_categories()
    {
        return $this->hasManyThrough(SubCategories::class, SubCategories::class, 'category_id', 'parent_id', 'id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function home_products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->get(5);
    }

    public function vendors()
    {
        return $this->hasMany(Vendor::class, 'category_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        MainCategories::observe(MainCategoriesObserver::class);
    }
}
