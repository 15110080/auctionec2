<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidder;
use App\Cart;
use App\CartDB;
use App\Cart_detail;
use Session;

class Authcontroller extends Controller
{

    public function getDangky(){
        return view('dangky');
    }

    public function getDangxuat(){
        Session::flush();
        return redirect('dangnhap');
    }
    
    public function getDangnhap(){
        if(Session::has('dangnhap')){
            return redirect('/');
        }
        else
    	return view('dangnhap');
    }
     
   
    public function postDangky(Request $request){
          function pass2str($user, $pwd){
                $hex = $user.$pwd;
                $hex = md5($hex);
                $str='';
                for ($i=0; $i < strlen($hex)-1; $i+=2){
                    $str .= chr(hexdec($hex[$i].$hex[$i+1]));
                }
                return $str;
                }
        $bidder_new = new Bidder();
        $bidder_new->name = $request->hoten;
        $bidder_new->address = $request->diachi;
        $bidder_new->cmnd = $request->cmnd;
        $bidder_new->phone_number = $request->sdt;
        $bidder_new->username = $request->username;
        $Salt = pass2str($request->username, $request->password);
        $bidder_new->password =  $Salt ;
        $bidder_new->save();
        return view('thanhcong',['thongbaodk'=>'Đăng ký thành công']);
    }

    public function postDangnhap(Request $request){
        $username = $request['username'];
        $md5pass     = md5($request['password']);
        $pass     = $md5pass;
        $bidder   = Bidder::Where('username',$username)->first();
        // dd($bidder);
        if($bidder!=null && $bidder->password == $pass ){
            Session::flush();
            Session::put('dangnhap',$bidder);
            Session::put('item_id',0);                                              // Tạo session id_item mỗi mục trong giỏ hàng  
            $cart_db = CartDB::Where('id_bidder',Session('dangnhap')->id)->first(); // lay id cart

            if(!$cart_db) {return redirect('/');}
            else
            {
                Session::put('id_cart',$cart_db->id);                     // Lưu id_cart để xóa    
                $cart_detail = Cart_detail::where('id_cart', $cart_db->id)
                              ->join('products','products.id','=','cart_detail.id_product')                                     
                              ->select('products.id','name','image','cart_detail.price','create_at')->get();
                 $oldcart=null;
                 $cart= new Cart($oldcart); 
                 foreach ($cart_detail as $value) 
                 {
                    $item_id = Session('item_id')+1; // item 1
                    Session::put('item_id',$item_id);
                    $cart->add($value,$item_id);
                    Session()->put('cart',$cart);    
                 }                                 

                   return redirect('/');
            }

        }
        else
          return redirect()->back()->with('error','Đăng nhập không thành công');
          //  return view('dangnhap',['error'=>'Đăng nhập không thành công']);
    }
}
