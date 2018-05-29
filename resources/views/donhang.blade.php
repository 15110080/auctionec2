@extends('pages.master')

@section('content')

<div class="container">
		<div class="row" 	>
			
		</div>
<div class="row" style="margin: auto;padding: 70px 0 300px 0">
	<!-- Bảng danh sách đơn hàng của tài khoản -->
  	@if(Session::has('dangnhap') && Session::has('orders')) 
  	<div class="row" style="display:contents;">
  		<div class="col-lg-5">
  			<br><br><br><br>
			<div class="row">
				<center><h4>Tra cứu theo mã đơn hàng</h4></center>
				<p>Điền vào các thông tin bên dưới để xem tình trạng vắn tắt của Đơn hàng</p>
			</div>
			<div class="row">
				<form  style="flex-flow: unset;" class="form-inline" action="{{route('posttracuu')}}" method="post">
					<input name="_token" type="hidden" value="{{ csrf_token() }}" />

				<!-- Đã đăng nhập không cần nhập Email -->
				<div class="form-group ">
					<label for="order">Mã đơn hàng &nbsp&nbsp</label>
					<input name="code" type="text" class="form-control" id="order-id" value="" required="">
					<span class="help-block"></span>
				</div>
				<button type="submit" class="btn btn-info" style="margin: 20px">Kiểm Tra</button>
									<br>
				</form>
			</div>
		</div>
  		<div class="col-lg-7">
  			<h3>Đơn hàng của bạn</h3>
			<div class="table-responsive ">
			<table class="table table-bordered">
				<tr>
					<th>Mã đơn hàng</th>
					<th>Ngày mua</th>
					<th>Tổng tiền</th>
					
				</tr>
				@foreach(Session::get('orders') as $order)
				<tr>
					<td>{{$order->madonhang}}</td>
					<td>{{$order->date_order}}</td>
					<td>{{number_format($order->total)}} VND</td>	
					
				</tr>
				@endforeach
			</table>
			</div>
  		</div>
  	@endif
	  </div>
	<!-- Số thứ tự các sản phẩm trên bảng -->
	<?php $i = 0; ?>
	<!-- Tìm thấy thông tin đơn hàng -->
	@if(Session::has('tracuu'))

	<div class="col-lg-12">
			<h5>Thông tin đơn hàng  <em>@if(!Session::has('dangnhap')) 
				({{Session('tracuu')[0]->madonhang}}) ({{Session('tracuu')[0]->email}})
			@endif</em></h5><br>
			<div class="table-responsive ">
			<table class="table table-bordered">
				<tr>
					<th>#</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Số lượng</th>
					<th>Ngày đặt hàng</th>
				</tr>
				@foreach($tracuu as $tracuu)
				<?php $i++; ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td>{{$tracuu->name}}</td>
					<td>{{number_format($tracuu->price)}} VND</td>
					<td>1</td>
					<td>{{$tracuu->created_at}}</td>
				</tr>
				@endforeach
				<tfoot>
					<tr>
						<td><td><td><td></td></td></td></td>
						<td>Tổng: {{number_format($tracuu->total)}} VND </td>
					</tr>
				</tfoot>
			</table>
			</div>
  	</div>	
  	    {{Session::forget('tracuu')}}
  	@endif
  	<!-- Email hoặc mã đơn hàng không đúng -->
  	@if(Session::has('tracuufail'))
  	<div class="row">
  		<div class="col-lg-3"></div>
	  	<div class="col-lg-6" align="center"">
	  		<div class="alert alert-danger"><p >{{Session::get('tracuufail')}}</p></div>
	  	</div>
  	</div>
  	@endif
	</div>
</div>

@endsection