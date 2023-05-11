<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Wireles World</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.css">
  <link href="../../../css/style.css" rel="stylesheet">
  <!-- CKEditor 5 – Classic editor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
  <script type="text/javascript">
    function confirmDelete (){
        if(window.confirm('Are you sure you want to delete ?') == true){
            return true;
        }
        return false;
    }
    </script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- SidebarSearch Form -->
      <div class="form-inline ml-4">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <div class="dropdown">
        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
          <div class="user-panel d-flex">
            <div class="image">
                @php
                    $avatar = $user-> avatar == NULL ? 'no-avatar.jpg' : $user -> avatar;
                    $image_url = asset('images/'. $avatar)
                @endphp     
              <img src="{{ $image_url }}" class="img-circle border" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="font-weight-bold d-block text-dark" > 
                {{ $user -> username }}
              </a>
            </div>
            <i class="fa fa-angle-down mt-2 mr-2"></i>
          </div>
        </button>
        <div class="dropdown-menu " style="left: 70px; right: inherit;" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href=" {{route('admin.member.edit', ['id' => $user -> id])}}">Profile</a>
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
      </div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo --> 
    <div class="bg-primary">
      <a href="{{ route('admin') }}" class="brand-link">
        <img src="../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class=" brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text text-uppercase text-dark">Admin Server</span>
      </a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.order.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Order</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-list"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Table </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create new category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-box"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.product.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create new product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class=" nav-icon fa fa-user"></i>
              <p>
                Member
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.member.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Table </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.member.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create new member </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-tag nav-icon"></i>
              <p>
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.brand.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.brand.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create new brand</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-newspaper nav-icon"></i>
              <p>
                News
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.news.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.news.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create new </p>
                </a>
              </li>
            </ul>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pl-5 pr-5 pt-3 ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield ('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark" href=" {{ route('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">@yield('page')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pl-4 pr-4 ">

      <!-- Default box -->
      <div class="card p-4">
        
        <div class="card-body">
            @yield ('content')
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- CKEditor 5 -->
<script>
         ClassicEditor
            .create( document.querySelector( '#desc' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#intro' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
