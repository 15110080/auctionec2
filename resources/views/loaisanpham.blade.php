@extends('pages.master')

@section('content')
<div id="between">
    <div class="row container-fluid linedown">
      <div class="col-2">
        <form  action="{{route('trangchutk')}}" method="post" value="{{ csrf_token() }}">
          <input name="_token" type="hidden" value="{{ csrf_token() }}" />
          <label id="home">
            <input type="text" class="form-control" id="Search" placeholder="Tìm kiếm"  name="search"> </label>
        </form>
      </div>
      <div class="col-10 linedown" style="margin:0px">
        <center >
          <b>Đợt đấu giá đang diễn ra</b>
        </center>
      </div>
    </div>
    <div class="row container-fluid">
      <div class="col-2">
        <div class="bs-sliderbar" style="background-color: #f6f6f6; min-height: 600px">
          <center>
            <h6>Danh mục</h6>
          </center>
          <nav class="nav flex-column">
            @foreach($produc_type as $productType)
            <a class="nav-link" href="{{Route('loaisp',$productType->id)}}">{{$productType->name}}</a>
           @endforeach
          </nav>
        </div>
      </div>
      <div class="col-10 container-fluid">
       
        @foreach($product as $sp_daugia)
        <div class="row container-fluid border ">
          <div class="col-8">
            <div class="row">
              <div class="col-2">
                <img src="../images/{{$sp_daugia->image}}" width="100px" height="130"> </div>
              <div class="col-10">
                <strong>{{$sp_daugia->name}}</strong>
                <p>{{$sp_daugia->description}}</p>
                <p>{{$sp_daugia->created_at}} | Thủ Đức, Thành Phố Hồ Chí Minh</p>
              </div>
            </div>
          </div>
          <div class="bid">
            <h6>Trực tiếp</h6>
            <button class="HappeningNow form-control">Đang đấu giá</button>
            <a href="{{route('daugia',$sp_daugia->id)}}">Vào đấu giá</a>
          </div>
        </div>
        @endforeach
 <!--        <center>
          <b>Sản phẩm sắp được đấu giá</b>
        </center>
        <div class="container">
          <div class="row my-4">
            <div class="col-md-4 center" >
              <img src="images/oppo.jpg" width="340" height="200" class="my-3 px-0"> 
              <span>Oppo R827 mini <br> 5.990.000 VND<br> Thời gian: 00:00 </span> </div>
            <div class="col-md-4 center">
              <img src="images/oppo.jpg" width="340" height="200" class="my-3 px-0"><span>Oppo R827 mini <br> 5.990.000 VND<br> Thời gian: 00:00 </span> </div>
            <div class="col-md-4 center">
              <img src="images/oppo.jpg" width="340" height="200" class="my-3 px-0"><span>Oppo R827 mini <br> 5.990.000 VND<br> Thời gian: 00:00 </span> </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
@endsection