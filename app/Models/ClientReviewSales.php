<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\SalesChannels;

class ClientReviewSales extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'sales_id', 'answer'];

    protected $dates = ['created_at', 'updated_at'];

    public function client () {
        $this->belongsTo(client::class, 'client_id'); 
    }
 
    public function sales () {
        $this->belongsTo(SalesChannels::class, 'sales_id'); 
    }
}
