<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
      protected $table = "seller";

		public function seller_auctionproduct(){
			return $this->hasMany('App\Seller_AuctionProduct','id_seller','id');
		}
}
