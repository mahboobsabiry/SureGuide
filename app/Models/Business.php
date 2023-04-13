<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'desc'];

    protected $dates = ['created_at', 'updated_at'];

    public function industry () {
        $this->hasMany(BusinessIndustry::class);
    }
}
 