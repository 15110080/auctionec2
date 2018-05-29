@extends('pages.master')
@section('content')
<div id="between">
    <div class="row container-fluid linedown">
      <div class="row container-fluid col-8">
          <div class="row container-fluid frame text-uppercase  align-items-center">
              <div class="col-2 linedown"></div>
                <div class="col-4 linedown">
                  <p>Tên sản phẩm</p>
                </div>
                <div class="col-3 linedown">
                  <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGiá</p>
                </div>
                <div class="col-3 linedown">
                  <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThời gian</p>
                </div>
            </div>
          @if(Session::has('cart'))
          @foreach($product_cart as $product)
          <div class="row container-fluid">
            <div class="col-2 linedown">
              <img src="../images/{{$product['item']['image']}}" alt="Logo" height="70" width="90"> </div>
            <div class="col-4 linedown">
              <p>{{$product['item']['name']}}</p>
            </div>
            <div class="col-3 linedown">
              <p>{{number_format($product['price']) }} VND</p>
            </div>
            <div class="col-3 linedown">
              <p>{{$product['item']['create_at']}}</p>
              
            </div>
          </div>
          @endforeach
          @endif
    </div>
      <div class="col-4 text-uppercase bg-secondary text-light">
        <p>Thông tin đơn hàng: </p>
        @if(Session::has('cart'))
        <p>Tông giá: {{number_format(Session('cart')->totalPrice)}} VND </p>
        @else
        <p>Tông giá: 0 VND </p>
        @endif
        <button class="btn btn-primary" @if(Session::has('cart')) onclick="javascript:location.href='{{route('thanhtoan')}}'" @else onclick="thongbao()" @endif>Thanh toán</button>
      </div>
    </div>
  </div>
  <script>
    function thongbao(){
      alert('Giỏ hàng trống');
    }
  </script>
@endsection