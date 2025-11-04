<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryContractType extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $table = 'category_contract_types';
    
    protected $fillable = [
        'category_id',
        'contract_type_id'
    ];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }
}
