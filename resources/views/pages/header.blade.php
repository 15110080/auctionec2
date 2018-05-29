<!DOCTYPE html>
<html >
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="_token" content="{{csrf_token()}}" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet"  href="../css/bootstrap.min.css">
  
  <title>Homepage!</title>
  <!-- Custom styles for this template -->
  <link href="../css/HomePage.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120022461-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120022461-1');
</script>

   </head>

<body>
  <?php 
  function split_name($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
}
  if(Session::has('dangnhap'))
  $ten = split_name(Session('dangnhap')->name);

 ?>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{route('trangchu')}}">
        <img src="../images/logo.jpg" alt="Logo" height="70" width="90"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('trangchu')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
         
        </ul>
        <div class="my-2 my-lg-0">
          <h6 class="my-2 my-sm-0">

            <a @if(Session::has('cart')) href="{{route('giohang')}}" @elseif(!Session::has('dangnhap'))  href="#" onclick="alert('Bạn chưa đăng nhâp!');" @else  href="#" onclick="alert('Giỏ hàng trống!');" @endif >
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
              </svg>
              @if(Session::has('cart'))
                <span>({{Session('cart')->totalQty}})</span>
              @endif
            </a>
            @if(Session::has('dangnhap'))
             <a href="/kiem-tra-don-hang">Đơn hàng của  {{$ten[1]?$ten[1]:$ten[0]}}</a>
             <a href="/profile">Tài khoản của {{$ten[1]?$ten[1]:$ten[0]}}</a>
              <a href="{{route('dangxuat')}}">&nbsp Đăng xuất</a>
            @else
             <a href="{{route('dangky')}}">Đăng Ký</a>/
            <a href="{{route('dangnhap')}}">Đăng Nhập</a>
            @endif
           
            
          </h6>
        </div>
      </div>
    </nav>
  </header>
  <script>
    $(document).on("click","#link",function(){ // thêm id vào tag <a> để hiện thông báo 
       alert("I am a pop up ! ");
                                          });
  </script>
