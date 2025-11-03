<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeatureType;
use App\Models\Property;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'code',
        'name'
    ];

    public function type()
    {
        return $this->belongsTo(FeatureType::class, 'type_id');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_features');
    }
}
