<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidder_AuctionProduct extends Model
{	
	public $timestamps = false;
	protected $table = "bidder_auctionproduct";
    public function product(){
			return $this->belongsTo('App\AuctionProduct','id_product','id_product');
		}
		public function bidder(){
			return $this->belongsTo('App\Bidder','id_bidder','id_bidder');
		}
}
