<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;
use App\Models\BusinessOffer;
use App\Models\Demand;
use App\Models\SalesChannels;
use App\Models\MarketOpportunity; 
use App\Models\ClientReviewIndustry;

class BusinessIndustry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'business_id'];

    protected $dates = ['created_at', 'updated_at'];

    // Business
    public function business () {
        $this->belongsTo(Business::class, 'business_id'); 
    }
 
    // Business Industry has Offers
    public function offers () {
        $this->hasMany(BusinessOffer::class); 
    }

    // Business Industry has demands
    public function demands () {
        $this->hasMany(Demand::class); 
    }

    // Business Industry has sales
    public function sales () {
        $this->hasMany(SalesChannels::class); 
    }

    // Business Industry has market opportunities
    public function marketOpportunities () {
        $this->hasMany(MarketIpportunity::class); 
    }

    // Client Review Industry
    public function clientReviewIndustry () {
        $this->hasMany(ClientReviewIndustry::class); 
    }
}
