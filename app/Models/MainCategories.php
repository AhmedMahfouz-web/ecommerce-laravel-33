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
        return $this->hasMany(subCategories::class, 'category_id', 'id');
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
