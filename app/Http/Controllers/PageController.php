<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuctionProduct;
use App\Bidder;
use App\ProductType;
use App\Bidder_AuctionProduct;
use App\Cart;
use App\CartDB;
use App\Cart_detail;
use App\Orders;
use App\OrderDetail;
use App\timebid;
use Carbon\Carbon;
use Session;
class PageController extends Controller
{
    public function getGiohang(){
        return view('giohang');
    }

    public function getThanhtoan(){  
        return view('thanhtoan');
    } 

    public function getIndex(){
        $product = AuctionProduct::Where('state',1)->get();
        $produc_type = ProductType::all();
        return view('trangchu',['product'=>$product,'produc_type'=>$produc_type]);
    }
    public function getLoaisp($id){
        $product = AuctionProduct::Where('id_type',$id)->get();
        $produc_type = ProductType::all();
        return view('loaisanpham',['product'=>$product,'produc_type'=>$produc_type]);
    }

    public function getSearch(Request $req) {

        $search = AuctionProduct::where('name','like','%'.$req->search.'%')->get();
        $produc_type = ProductType::all();
        return view('trangchu',['product'=>$search,'produc_type'=>$produc_type]);
    }

    public function getDaugia($id){

        $getsp = AuctionProduct::Where('id',$id)->first();
        $time_bid = timebid::where('id_product',$id)->first();
        $bidders = Bidder_AuctionProduct::Where('id_product',$id)
                                ->join('bidder', 'bidder.id', '=', 'bidder_auctionproduct.id_bidder')
                                ->select('bidder.id','name','bid_price','bidder_auctionproduct.created_at','username')
                                ->orderBy('bid_price', 'desc')
                                ->get();
        Session::put('timebid',$time_bid);
        if($bidders->get(0) != null)
        {
          Session::put('highestBidder',$bidders[0]); // Lưu thông tin người đấu giá cao nhất
          // xem người cao nhất có phải là chủ tài khoản đang đăng nhập
          if(Session::has('dangnhap') && (Session('highestBidder')->id == Session::get('dangnhap')->id))
           { 
              if(Session('timebid')->gio == 0 && Session('timebid')->phut == 0 && Session('timebid')->giay == 1) 
              {
                if(Session('timebid')->id_bidder == null)
                {
                     $owner = array('my' =>'yes' ,'state' =>0 ); //het dau gia va hang chua them vao gio hang
                     Session::put('spdangdaugia',$owner);
                }
                 else
                {
                     $owner = array('my' =>'true1' ,'state' =>0 );// het dau gia va hang da them vao gio hang
                     Session::put('spdangdaugia',$owner);
                }

            }
            
                 else
                  {
                       $owner = array('my' =>'yes' ,'state' =>1);// con dau gia
                       Session::put('spdangdaugia',$owner);
                  }
         }

            else
             {

                  if(Session('timebid')->gio == 0 && Session('timebid')->phut == 0 && Session('timebid')->giay == 1) 
                  {
                     $owner = array('my' =>'no','state' =>0 );
                       Session::put('spdangdaugia',$owner); 
                  }
                  else
                  {
                      $owner = array('my' =>'no','state' =>1 );
                       Session::put('spdangdaugia',$owner); 
                  }
              } 
        }

         else Session::forget('highestBidder');
        return view('daugia',['getsp'=>$getsp,'bidders'=>$bidders]);
    }

    public function postDaugia($id){
        $bidder_product = new Bidder_AuctionProduct();
        $bidder_product->id_product = $id;
        $bidder_product->id_bidder = Session::get('dangnhap')->id;
        if(!Session('highestBidder'))
          $bidder_product->bid_price = 100000;
        else if(Session('highestBidder')->bid_price<=100000)
        $bidder_product->bid_price = Session('highestBidder')->bid_price+10000;
        else
        $bidder_product->bid_price = Session('highestBidder')->bid_price + Session('highestBidder')->bid_price*0.2;
        $bidder_product->save();
        return redirect()->back();
    }

    public function getAddtocart(Request $req,$id){
        $product=AuctionProduct::find($id);
        $item_id = Session('item_id')+1; // Session('item_id') được tạo lúc đăng nhập
        Session::put('item_id',$item_id);
        $oldcart=Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldcart);
        $cart->add($product,$item_id);
        $req->Session()->put('cart',$cart);
        //$product_cart = Session::get('cart')->items;
        $cart_db = CartDB::Where('id_bidder',Session('dangnhap')->id)->select('id')->first(); // lấy id cart của tài khoản
        
        if(!$cart_db)   // nếu không có 
          {
            $cart_new = new CartDB();
            $cart_new->id_bidder = Session::get('dangnhap')->id;
            $cart_new->total_price = Session::get('cart')->totalPrice;
            $cart_new->Soluong = Session::get('cart')->totalQty;
            $cart_new->save();

            $cart_detail = new Cart_detail();
            $cart_detail->id_product = $id;  
            $cart_detail->id_cart = $cart_new->id; 
            if(Session('spdangdaugia')['my'] == "yes" && Session('spdangdaugia')['state'] == 0)
                {
                  $cart_detail->price = Session('highestBidder')->bid_price;
                  timebid::where('id',$id)->update(['id_bidder'=>Session::get('dangnhap')->id]);
                }
            else
              $cart_detail->price = $product->price;

         //    $cart_detail->create_at = Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh'));
            $cart_detail->save();
            $cart_db = $cart_new->id;
            Session::put('id_cart',$cart_new->id);  // Lưu id_cart để xóa
            }
        else  
           {
              $cart_update = CartDB::Where('id',$cart_db->id)->update(['id_bidder'=>Session::get('dangnhap')->id,
                                                                      'total_price'=>Session::get('cart')->totalPrice,
                                                                      'Soluong'=>Session::get('cart')->totalQty]);
              $cart_detail = new Cart_detail();
              $cart_detail->id_product =  $id;  
              $cart_detail->id_cart = $cart_db->id; 

             if(Session('spdangdaugia')['my'] == "yes" && Session('spdangdaugia')['state'] == 0)
                  {
                    $cart_detail->price = Session('highestBidder')->bid_price;
                    timebid::where('id',$id)->update(['id_bidder'=>Session::get('dangnhap')->id]);
                  }
              else
                $cart_detail->price = $product->price;
            //  $cart_detail->create_at = Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh'));
              $cart_detail->save();

          }

          // in ngày
          $cart_detail1 = Cart_detail::where('id_cart', Session('id_cart'))
                              ->join('products','products.id','=','cart_detail.id_product')                                     
                              ->select('products.id','name','image','cart_detail.price','create_at')->get();
                 $oldcart=null;
                 $cart= new Cart($oldcart); 
                 foreach ($cart_detail1 as $value) 
                 {
                    $item_id = Session('item_id')+1; // item 1
                    Session::put('item_id',$item_id);
                    $cart->add($value,$item_id);
                    Session()->put('cart',$cart);    
                 }

             return redirect('giohang');
         }
         public function postThanhtoan(Request $req){
            $cart=Session::get('cart');
            $i=rand(1000,10000);
            $order = new Orders;
            $order->madonhang= $i;
            $order->id_bidder = Session::get('dangnhap')->id;
            $order->date_order = date('Y-m-d');
            $order->total = $cart->totalPrice;
            $order->payment=$req->payment;
            $order->save();
            foreach ($cart->items as $key => $value) {
            $order_detail= new OrderDetail;
            $order_detail->id_order=$order->id;
            $order_detail->id_product =  $value['item']['id'];
            $order_detail->price=$value['price'];
            $order_detail->save();
            }
            Cart_detail::where('id_cart',Session('id_cart'))->delete();
            Session::forget('cart');

            return view('thanhcong',['code'=>'Mã đơn hàng của bạn là :'.$i,'thongbao'=>'Bạn đã mua hàng thành công']);
     } 

     public function postupdateDB(Request $req){
          if(!($req->giay == 0 && $req->phut == 0 && $req->gio ==0)) 
          {
             $timebid = timebid::Where('id',Session('timebid')->id)->update(['gio'=>$req->gio,
                                                                        'phut'=>$req->phut,
                                                                        'giay'=>$req->giay]);
             $giadauhientai = Bidder_AuctionProduct::Where('id_product',Session('timebid')->id_product)
                                ->orderBy('bid_price', 'desc')
                                ->first();
             if(Session('highestBidder')->bid_price != $giadauhientai->bid_price){
              Session::forget('highestBidder');
              Session::put('highestBidder',$giadauhientai);
             return (response()->json(['success'=>'']));
             }

             //return response()->json(['success'=>'Chúc mừng ... người đang dẫn đầu phiên đấu giá này ']);
          }
           else
           {
              return (response()->json(['success'=>'Phiên đấu giá này đã kết thúc']));
            }
          }

    public function getTracuu(){
         Session::forget('orders'); // Load lại session
         $orders = Orders::where('id_bidder',Session::get('dangnhap')->id)->get();
         Session::put('orders',$orders);
         return view('donhang');
  }

public function postTracuu(Request $req){
        $code = $req['code'];
      
            // Lọc ra chi tiết đơn hàng theo đia chỉ Email + code
            $orders_detail= Bidder::Where('username',Session::get('dangnhap')->username)
                        ->join('orders','id_bidder','=','bidder.id')
                        ->join('order_Detail', function ($join) use ($code) {
                              $join->on ('order_detail.id_order','=','orders.id')
                             ->where('orders.madonhang', '=',$code);})
                        ->join('products','products.id','=','order_detail.id_product')
                        ->select('bidder.name','products.name','order_detail.price','total','madonhang','date_order','orders.created_at') 
                        ->get();
            // Lưu danh sách đơn hàng
         
        $orders_detail = $orders_detail->values();
        //dd($orders->get(0));
        //dd($orders->isEmpty());
        if($orders_detail->get(0) != null){ // Nếu tồn tại đơn hàng
            Session::put('tracuu',$orders_detail);      
            //$tracuu = Session::get('tracuu');
           
            return redirect()->back();
        }
        else
           return redirect()->back()->with('tracuufail','Email hoặc mã đơn hàng của bạn không hợp lệ');
    }
      public function postupdateinfo(Request $req){
         
         $postupdateinfo = Bidder::Where('id',Session('dangnhap')->id)->update(['name'=>$req->hoten,
                                                                        'phone_number'=>$req->sdt,
                                                                        'cmnd'=>$req->cmnd,
                                                                        'address'=>$req->diachi]);
         $bidder = Bidder::where('id',Session('dangnhap')->id)->first();
         Session::put('dangnhap',$bidder); 

         return redirect()->back();
  }


}

// return $this->getIndex(); // link
