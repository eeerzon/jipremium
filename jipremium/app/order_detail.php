<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $guarded = [];

	public $incrementing = false;
	protected $keyType = 'string';
}
