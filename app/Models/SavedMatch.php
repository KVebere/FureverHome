<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedMatch extends Model
{
    protected $primaryKey = 'saved_matches_id';

    protected $fillable = [
        'adopter_id',
        'animal_id',
    ];

    public function animal()
    {
        return $this->belongsTo(Animals::class, 'animal_id');
    }

    public function adopter()
    {
        return $this->belongsTo(Adopter::class, 'adopter_id');
    }
}
