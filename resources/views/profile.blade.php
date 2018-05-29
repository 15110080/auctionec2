@extends('pages.master')

@section('content')

<body>
	 <link href="../Css/style.css" rel="stylesheet">
	<!-- Begin Wrapper -->
	<div id="wrapper">
	 
	<!-- Begin Content Area -->
	<div id="content">
	 
	<!-- Begin Header -->
	<header>
	 
	<!-- Begin Contact Section -->
	<section id="contact-details">
	 
	<!-- Begin Profile Image Section -->
	<div class="header_1">
	<img src="../images/avatar.png" width="250" height="250" alt="Your Name" />
	</div>
	<!-- End Profile Image Section -->
	 
	<!-- Begin Profile Information Section -->
	<div class="header_2">
	<form class="form-signin" action="{{route('postupdateinfo')}}" method="post" >
              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
      <div class="form-label-group">
        <label for="inputName">Tên Tài Khoản</label>
        <input type="name" id="inputName" class="form-control" value="{{Session('dangnhap')->name}}"  name="hoten" required="">
        
      </div>

      <div class="form-label-group">
      	<label for="inputNumber">Số điện thoại</label>
            <input type="text" id="inputNumber" class="form-control" value="{{Session('dangnhap')->phone_number}}" name="sdt" required="" autofocus="">
        
      </div>

       <div class="form-label-group">
       	     <label for="inputAddress">Địa chỉ</label>
        <input type="address" id="inputAddress" class="form-control" value="{{Session('dangnhap')->address}}" name="diachi" required="" autofocus="">
   
      </div>
      <div class="form-label-group">
      	    <label for="inputEmail">Email</label>
        <input type="email" id="inputEmail" class="form-control" value="{{Session('dangnhap')->username}}" name="username" readonly="readonly" required="" autofocus="">
    
      </div>

      <div class="form-label-group">
      	  <label for="inputPassword">CMND</label>
        <input type="CMND" id="inputPassword" class="form-control" value="{{Session('dangnhap')->cmnd}}" name="cmnd" required="">
      
      </div>
      <br>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Cập Nhật</button>
    </form>
  </body>
	 <!--
	<h1><span>Your Name</span></h1>
	 
	<ul class="info_1">
	<li class="address">555 Street Address, Toledo, Ohio, 43606  U.S.A.</li>
	</ul>
	 
	<ul class="info_2">
	<li class="phone">(000) 000-0000</li>
	<li class="email"><a href="mailto:your-email@gmail.com">your-email@gmail.com</a></li>
	</ul>
	 -->
	</div>
	<!-- End Profile Information Section -->
	 
	</section>
	<!-- End Contact Section -->

@endsection