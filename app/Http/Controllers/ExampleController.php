<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;    
use App\Bidder;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function getDangnhap(){
    	return view('example.dangnhap');
    }

    public function logined1(Request $request){
        $username = $request['username'];
        $pass     = $request['password'];
    	$bidder      = Bidder::Where('username',$username)->first();
    	if($bidder != null && $bidder->password == $pass ){
    	//	return view('example.thanhcong',['bidder'=>$bidder]);
            return ('Dang nhap thanh cong');
    	}
    	else return "Dang nhap khong thanh cong";
    }
    public function thanhcong(){

        return view('thanhcong');

    }
    public function logined2(Request $request){
    $email = $request['username'];
    $password = $request['password'];
    if(Auth::attempt(['email'=>$email,'password'=>$password]))
        return view ('example.thanhcong');
    else
        return view('example.dangnhap',['error'=>'Dang nhap khong thanh cong']);

    }
}
