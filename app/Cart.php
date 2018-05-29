<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}	

	public function add($item, $id){
		if(Session('spdangdaugia')['my']== "yes" && Session('spdangdaugia')['state']== 0)
		{
			$gia=Session('highestBidder')->bid_price;
		}
		else
			$gia=$item->price;

		$giohang = [ 'price' => $gia, 'item' => $item];
		$giohang['price'] = $gia;
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $gia;
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
