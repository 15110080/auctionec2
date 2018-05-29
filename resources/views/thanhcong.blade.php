@extends('pages.master')
@section('content')
<div id="between">
	<div class="container" >
		<div class="row text-center">
	        <div class="col-sm-12 col-sm-offset-3" >
	        <br><br> <h2 style="color:#0fad00">{{$thongbaodk or ''}}</h2>
	        <br><br> <h2 style="color:#0fad00">{{$thongbao or ''}}</h2>
	        <div style="margin: 40px">
	        	<img src="../images/dathangthanhcong.png">
	        </div>
	        <h3>{{$code or ''}}</h3>
	        <br><br>
	        <a href="/" class="btn btn-success">   Quay về trang chủ     </a>
	    	<br><br>
	        </div> 
		</div>
	</div>
</div>


@stop