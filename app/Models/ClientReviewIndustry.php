<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\BusinessIndustry;

class ClientReviewIndustry extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'industry_id'];

    protected $dates = ['created_at', 'updated_at'];
 
    public function client () {
        $this->belongsTo(Client::class, 'client_id'); 
    }

    public function industry () {
        $this->belongsTo(BusinessIndustry::class, 'industry_id'); 
    }
}
