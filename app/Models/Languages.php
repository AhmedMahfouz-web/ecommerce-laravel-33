<?php

namespace App\Models;

use App\Observers\LanguagesObserver;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $fillable = [
        'abbr', 'local', 'name', 'direction', 'active',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'abbr', 'name', 'direction', 'active');
    }

    public function main_category()
    {
        return $this->hasMany(MainCategories::class, 'translation_lang', 'abbr');
    }

    public function sub_category()
    {
        return $this->hasMany(SubCategories::class, 'translation_lang', 'abbr');
    }

    protected static function boot()
    {
        parent::boot();
        Languages::observe(LanguagesObserver::class);
    }
}
