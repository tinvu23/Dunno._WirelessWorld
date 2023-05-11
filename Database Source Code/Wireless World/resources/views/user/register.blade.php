<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register || Wireless Shop </title>

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
      <h2 class="text-center"> Register </h2>
      @if (Session::has('error'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ Session::get('error') }}</strong>
      </div>
      @endif
  
        
      <form class="mt-2 mb-2" action="{{ route('postRegister')}}" enctype="multipart/form-data"  method="POST">
        @csrf
        <div class=" mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class=" mb-3">
          <input type="text" name="fullname" class="form-control" placeholder="Fullname">
        </div>
        <div class=" mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class=" mb-3">
          <input type="text" name="phone" class="form-control" placeholder="Phone">
        </div>
        <div class=" mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
            <input type="file" name="avatar">
        </div>
        <div class=" mb-3">
          <input type="text" name="address" class="form-control" placeholder="Address">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><b>Register</b></button> 
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <div class="card-footer">
      <span class="text-dark"> Have already an account? </span><a class="text-dark" href="{{ route('getLogin')}}"> <b>Login here </b></a>
    </div>
      <!-- /.form-box -->
    </div><!-- /.card -->

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
