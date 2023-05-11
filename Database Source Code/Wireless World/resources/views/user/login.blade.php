<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login || Wireless Shop</title>

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link href="css/style.css" rel="stylesheet">
</head>
<body >
<div class="hold-transition bg-dark register-page">
  <div class="">
    <div class="card">
      <div class="card-header">
            <a href=" {{ route('index')}}" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Wireless</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">World</span>
            </a>
      </div>
      <div class="card-body register-card-body">
        <h2 class="text-center"> Login </h2>
        @if (Session::has('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ Session::get('error') }}</strong>
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
          <form  class="mt-2 mb-2" action="{{ route('postLogin')}}"  method="POST">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fa fa-lock"></i>
                </div>
              </div>
            </div>
            <div class="mb-3 d-flex flex-row-reverse">
              <a class="text-dark" href=" {{ route('getPassword')}}"> <b> Forgot password ?</b></a>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block"><b> Login </b></button>
              </div>
              <!-- /.col -->
            </form>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      <div class="card-footer">
        <a class="text-dark" href="{{ route('getRegister')}}"><b>Create account ? </b></a>
      </div>
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
