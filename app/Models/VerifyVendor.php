<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyVendor extends Model
{
    protected $guarded = [];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }
}
