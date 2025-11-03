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

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
