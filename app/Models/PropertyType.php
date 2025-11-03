<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
        'name_ar',
        'name_en'
    ];
    // -------------------------------------------------------------
    // Route Key Name
    // -------------------------------------------------------------
    public function getRouteKeyName()
    {
        return 'name_en';
    }
    // -------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function attributeDefinitions()
    {
        return $this->hasMany(PropertyAttributeDefinition::class);
    }
}
