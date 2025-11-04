<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\PropertyType;
use App\Models\ContractType;
use App\Models\PropertyFeature;
use App\Models\PropertyAttributeValue;
use App\Models\Feature;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'property_type_id',
        'contract_type_id',
        'price',
        'owner',
        'offerer',
        'lat',
        'lng',
        'location',
        'slug'
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }
    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }
    public function propertyFeatures()
    {
        return $this->hasMany(PropertyFeature::class);
    }
    public function propertyAttributeValues()
    {
        return $this->hasMany(PropertyAttributeValue::class);
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_features');
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'property_favorites')->withTimestamps();
    }
}
