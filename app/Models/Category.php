<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;
use App\Models\ContractType;
use App\Models\Property;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
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
    public function propertyTypes()
    {
        return $this->hasMany(PropertyType::class);
    }

    public function contractTypes()
    {
        return $this->belongsToMany(ContractType::class, 'category_contract_types');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
