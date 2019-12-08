<?php

namespace App\Models;

class Image extends BaseModel
{
    protected $fillable = ['type', 'path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
