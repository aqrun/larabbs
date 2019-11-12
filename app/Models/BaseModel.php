<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    public function scopeRecent($query)
    {
        return $query->orderBy('id', 'desc');
    }
}
