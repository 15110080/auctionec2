<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidder extends Model
{
		public $timestamps = false;

    protected $table = "bidder";
    public function orders(){
			return $this->hasMany('App\Orders','id_bidder','id');
		}
		public function bidder_auctionproduct(){
			return $this->hasMany('App\Bidder_AuctionProduct','id_bidder','id');
		}
}
