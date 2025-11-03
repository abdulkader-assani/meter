<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;

class FeatureType extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name'
    ];

    public function features()
    {
        return $this->hasMany(Feature::class, 'type_id');
    }
}
