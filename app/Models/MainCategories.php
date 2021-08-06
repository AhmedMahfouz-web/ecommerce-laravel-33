<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategories extends Model
{
    protected $fillable = [
        'trabslation_lang', 'translation_of', 'name', 'slug', 'photo', 'active',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'translation_lang', 'name', 'photo', 'slug', 'active', 'translation_of');
    }

    public function categories()
    {
        return $this->hasmany(self::class, 'translation_of');
    }
}
