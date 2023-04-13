<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessIndustry;

class BusinessOffer extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'answer', 'industry_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function industry () {
        $this->belongsTo(BusinessIndustry::class, 'industry_id'); 
    }
}
 