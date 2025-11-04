<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
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
        return 'slug';
    }
    // -------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_contract_types');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
