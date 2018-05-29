<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller_AuctionProduct extends Model
{
	  protected $table = "seller_auctionproduct";
    	public function seller(){
			return $this->belongsTo('App\Seller','id_seller','id_seller');
		}
		public function product(){
			return $this->belongsTo('App\AuctionProduct','id_product','id_product');
		}    
}
