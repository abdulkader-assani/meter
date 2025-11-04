<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAttributeDefinition extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_type_id',
        'code',
        'name'
    ];

    // -------------------------------------------------------------
    // Route Key Name
    // -------------------------------------------------------------
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // -------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function values()
    {
        return $this->hasMany(PropertyAttributeValue::class, 'attribute_id');
    }
}
