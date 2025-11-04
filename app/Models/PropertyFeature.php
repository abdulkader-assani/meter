<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $table = 'property_features';
    
    protected $fillable = [
        'property_id',
        'feature_id'
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

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
