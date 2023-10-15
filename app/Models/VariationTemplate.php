<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationTemplate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getVariationValueTemplate(){
        return $this->hasMany(VariationValueTemplate::class, 'variationTemplate_id', 'id');
    }
}
