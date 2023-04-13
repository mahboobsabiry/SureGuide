<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Demand;

class ClientReviewDemand extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'industry_id', 'answer'];

    protected $dates = ['created_at', 'updated_at'];
 
    public function client () {
        $this->belongsTo(Client::class, 'client_id'); 
    }

    public function demand () {
        $this->belongsTo(Demand::class, 'demand_id'); 
    }
}
