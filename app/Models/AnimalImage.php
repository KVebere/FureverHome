<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class AnimalImage extends Model
{
    protected $primaryKey = 'image_id';

    protected $fillable = [
        'animal_id',
        'image_path',
        'is_primary',
        'uploaded_by'
    ];

    public function animal()
    {
        return $this->belongsTo(Animals::class, 'animal_id');
    }
}

