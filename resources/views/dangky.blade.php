<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng Ký</title>

    <!-- Bootstrap core CSS -->
<!--     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
  <link rel="stylesheet"  href="../css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="./css/Login.css" rel="stylesheet">
  </head>

  <body>  
    <form class="form-signin" action="{{route('postdangky')}}" method="post" >
              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

      <div class="text-center mb-4">
        <img class="mb-4" src="./images/logo.jpg" alt="" width="150" height="120">
        <h1 class="h3 mb-3 font-weight-normal">Đăng Kí</h1>
      </div>

      <div class="form-label-group">
        <input type="name" id="inputName" class="form-control" placeholder="Name" name="hoten" autofocus="" required="">
        <label for="inputName">Họ tên</label>
      </div>

      <div class="form-label-group">
            <input type="" id="inputNumber" class="form-control" placeholder="Number" name="sdt" required="" >
        <label for="inputNumber">Số điện thoại</label>
      </div>
       <div class="form-label-group">
        <input type="address" id="inputAddress" class="form-control" placeholder="Address" name="diachi" required="" >
        <label for="inputAddress">Địa chỉ</label>
      </div>
      <div class="form-label-group">
        <input type="cmnd" id="inputcmnd" class="form-control" placeholder="CMND" name="cmnd" required="" >
        <label for="inputcmnd">CMND</label>
      </div>
      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="username" required="" autofocus="">
        <label for="inputEmail">Email</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="">
        <label for="inputPassword">Mật khẩu</label>
      </div>


      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng ký</button>
      <br>
      <center><a href="/">Quay về trang chủ</a></center> 
      <p class="mt-5 mb-3 text-muted text-center">© EC-02</p>
    </form>
  </body>
</html>
