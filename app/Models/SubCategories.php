<?php

namespace App\Models;

use App\Observers\SubCategoriesObserver;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $fillable = [
        'translation_lang', 'category_id', 'parent_id', 'translation_of', 'name', 'slug', 'photo', 'active',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'translation_lang', 'category_id', 'parent_id', 'name', 'photo', 'slug', 'active', 'translation_of');
    }

    public function language()
    {
        return $this->belongsTo(Languages::class, 'translation_lang', 'abbr');
    }

    public function main_category()
    {
        return $this->belongsTo(MainCategories::class, 'category_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(self::class, 'translation_of');
    }

    public function sub_sub_categories()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function sub_categories()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }


    protected static function boot()
    {
        parent::boot();
        SubCategories::observe(SubCategoriesObserver::class);
    }
}
