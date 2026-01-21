<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Animals extends Model
{
    protected $primaryKey = 'animal_id';

    public function images()
    {
        return $this->hasMany(AnimalImage::class, 'animal_id');
    }

    public function primaryImage()
    {
        return $this->hasOne(AnimalImage::class, 'animal_id')
            ->where('is_primary', true);
    }
}

