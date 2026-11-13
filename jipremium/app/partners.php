<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partners extends Model
{
    protected $guarded = [];

    public function partnerAsset(){
        return $this->hasMany(PartnerAsset::class);
    }
}
