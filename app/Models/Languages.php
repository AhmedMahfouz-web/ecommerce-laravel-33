<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $fillable = [
        'abbr', 'local', 'name', 'direction', 'active', 
    ];
    
    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function scopeSelection($query) {
        return $query->select('id', 'abbr', 'name', 'direction', 'active');
    }
}
