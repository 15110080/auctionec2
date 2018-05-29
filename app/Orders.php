<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    	public $timestamps = false;

    	public function bidder(){
			return $this->belongsTo('App\Bidder','id_bidder','id');
		}
		public function order_detail(){
			return $this->hasMany('App\OrderDetail','id_order','id');
		}
}
	
