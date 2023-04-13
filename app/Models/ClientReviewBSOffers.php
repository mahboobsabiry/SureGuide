<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\BusinessOffer;

class ClientReviewBSOffers extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'bs_offer_id', 'answer'];

    protected $dates = ['created_at', 'updated_at'];

    public function client () {
        $this->belongsTo(client::class, 'client_id'); 
    }
 
    public function businessOffer () {
        $this->belongsTo(BusinessOffer::class, 'bs_offer_id'); 
    }
}
