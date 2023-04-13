<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientReviewIndustry;
use App\Models\ClientReviewBSOffers;
use App\Models\ClientReviewDemand;
use App\Models\ClientReviewSales;
use App\Models\ClientReviewMarket;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'client_number', 'business_name'];

    protected $dates = ['created_at', 'updated_at'];

    // Client Review Industry
    public function clientReviewIndustry() {
        $this->hasMany(ClientReviewIndustry::class);
    }

    // Client Review Business Offers
    public function clientReviewBSOffers() {
        $this->hasMany(ClientReviewBSOffers::class);
    }

    // Client Review Demand
    public function clientReviewDemand() {
        $this->hasMany(ClientReviewDemand::class);
    }

    // Client Review Sales
    public function clientReviewSales() {
        $this->hasMany(ClientReviewSales::class);
    }

    // Client Review Market Opportunity
    public function clientReviewMarket() {
        $this->hasMany(ClientReviewMarket::class);
    }
}
