<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnerAsset extends Model
{
    protected $guarded = [];

    public function partner(){
        // return $this->belongsTo(partners::class);

     return $this->belongsTo('App\partners','partners_id','id');
    }
}
