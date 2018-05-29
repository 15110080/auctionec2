<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	
    protected $table = "order_detail";
    	public $timestamps = false;

    public function product(){
			return $this->belongsTo('App\AuctionProduct','id_product','id');
		}
		public function orders(){
			return $this->belongsTo('App\Orders','id_order','id');
		}


}
