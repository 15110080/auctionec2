<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionProduct extends Model
{
	    protected $table = "products";
   		 public function order_detail(){
			return $this->hasMany('App\OrderDetail','id_product','id');
		}
		public function bidder_auctionproduct(){
			return $this->hasMany('App\Bidder_AuctionProduct','id_product','id');
		}    
		 public function seller_auctionproduct(){
			return $this->hasMany('App\Seller_AuctionProduct','id_product','id');
		}
		public function type_product(){
			return $this->belongsTo('App\ProductType','id_type','id');
		}  
}
