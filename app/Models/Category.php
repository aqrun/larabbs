<?php

namespace App\Models;


class Category extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description',
    ];
}
