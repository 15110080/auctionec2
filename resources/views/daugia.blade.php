@extends('pages.master')

@section('content')
<div id="between">
	<div  style="margin-left: 60px">
		@if($bidders->get(0))
	   <div class="alert alert-success" style=" margin-right:52px;display:none; text-align: center;">Chúc mừng <b>{{$bidders->get(0)->name}}</b> người đang dẫn đầu phiên đấu giá này</div>
	   @endif
		<div class="row container-fluid linedown">
			<div class="col-6 linedown">
				<center><p><b>Trình lịch sử đấu giá</b></p></center>	
			</div>
	        <div class="col-6 linedown">
	            <center><b>Sản phẩm đấu giá</b></center>
	        </div>
		</div>   
		<div class="row container-fluid ">
			<div id="bangdaugia" class="row col-6 border1" style="text-align: center;min-height: 400px; ">
				<div class="table-responsive">
				    <table class="table table-hover">
				      <thead>
				        <tr>
				          <th>#</th>
				          <th>Tên</th>
				          <th>Giá đấu</th>
				          <th>Thời gian đấu giá</th>
				        </tr>
				      </thead>
				      <tbody>
				      	@if($bidders->get(0))
				      	<?php  $i = 0; ?>
				      	@foreach($bidders as $bidder)
				    		<?php  $i++;?>
				        <tr>
				          <td><?php  echo $i; ?></td>
				          <td>{{$bidder->name}}</td>
				          <td>{{number_format($bidder->bid_price)}}VND</td>
				          <td>{{$bidder->created_at}}</td>
				        </tr>
				        @endforeach
				        @endif
				    </table>
				  </div>     
			</div>
			<div class="col-5 border1 putright">
				<div class="row">
					<div class="col-4">
						<div style="margin: 30px 0 0 10px;float: left">
						<img src="../images/{{$getsp->image}}" alt="Logo" height="150" width="130">
						</div>
					</div>
					@if($bidders->get(0))
					<div class="col-8">
							<div style=" margin: 30px 10px 0 0px">
							<div style="position: relative;left: 20px">
							<p>Thời gian : <span id="timer" style="color: blue;"></span> <span id="msg" style="color: red;"></span></p>
							@if(Session('spdangdaugia')['state']==0)
							<p>Người thắng :  <span style="color: blue;"> {{$bidders->get(0)->name}}&nbsp({{$bidders->get(0)->username}})</span></p>
							@else
							<p style="display: block;">Người thắng hiện tại:  <span style="color: blue;"> {{$bidders->get(0)->name}}&nbsp({{$bidders->get(0)->username}})</span></p>
							@endif
							<p>Giá đấu hiện tại :<span style="color: blue;"> {{number_format($bidders->get(0)->bid_price)}} VND </span></p>
							<p> Giá đấu tiếp theo <span style="color: blue;">
								@if($bidders->get(0)->bid_price <= 100000)
								{{number_format($bidders->get(0)->bid_price+10000)}}
								@else 	{{number_format($bidders->get(0)->bid_price+$bidders->get(0)->bid_price*0.2)}}@endif VND</span></p>
							@if(Session::has('dangnhap'))
							<div style=""><button class="btn btn-success" type="button" onclick="javascript:location.href='{{route('postdaugia',$getsp->id)}}'">Đấu giá ngay</button> </div>
							@else
							<div style=""><button class="btn btn-success" type="button"  onclick="javascript:location.href='{{route('dangnhap')}}'">Đấu Giá ngay</button> </div>
							
							@endif
							</div>
							</div>
					</div>
					@else 
					<div class="col-8">
							<div style=" margin: 30px 10px 0 0px">
							<div style="position: relative;left: 20px">
							<p>Thời gian : <span id="timer" style="color: blue;"></span> <span id="msg" style="color: red;"></span></p>
							
							<p style="display: block;">Người thắng hiện tại:  </p>
							
							<p>Giá đấu hiện tại :</p>
							<p> Giá đấu tiếp theo :</p>
							@if(Session::has('dangnhap'))
							<div style=""><button class="btn btn-success" type="button" onclick="javascript:location.href='{{route('postdaugia',$getsp->id)}}'">Đấu giá ngay</button> </div>
							@else
							<div style=""><button class="btn btn-success" type="button"  onclick="javascript:location.href='{{route('dangnhap')}}'">Đấu Giá ngay</button> </div>
							
							@endif
							</div>
							</div>
					</div>
					@endif
					
					
					
				
				</div>
				<div class="row">
					<div class="col-6">
						<div style="position: relative;left: 30px">
							 <p><b> Thông tin sản phẩm</b></p>
							<p>{{$getsp->name}}</p>
							<p>{{$getsp->description}}</p>
							<div > <p>Giá mua ngay : {{number_format($getsp->price)}}&nbsp VND</p></div>
							<div > <button class="btn btn-success" type="button" 
							@if(Session::has('dangnhap'))
							onclick="javascript:location.href='{{route('themgiohang',$getsp->id)}}'">
							@else
							onclick="javascript:location.href='/dangnhap'"> @endif Mua ngay</button> </div>	 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
 </script>
<script src="../js/timer.js"></script>
<script type="text/javascript">

	var hours   = {{Session('timebid')->gio}},
		minutes = {{Session('timebid')->phut}},
		seconds = {{Session('timebid')->giay}},
		my = "{{Session('spdangdaugia')['my']}}",
		dem = "{{Session('timebid')->id_bidder}}";

		if ({{Session('spdangdaugia')['state']}} == 1 )
			daugia({{$getsp->id}},hours,minutes,seconds,dem);

		if (my == "yes" && {{Session('spdangdaugia')['state']}} == 0 )
                {
           		 alert("Chúc mừng bạn là người sở hữu sản phẩm này, sản phẩm đã được đưa vào giỏ hàng của bạn.");
                  window.location.href = "/add-to-cart/{{$getsp->id}}"
                }
        if ({{Session('spdangdaugia')['state']}} == 0 ) daugia({{$getsp->id}},hours,minutes,seconds,"aa");


</script>

<script type="text/javascript">
	 		
			
</script>
      
@endsection