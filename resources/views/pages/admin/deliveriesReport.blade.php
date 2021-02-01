<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Riders Deliveries | Delivery</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  @include('pages.admin.styles.css')
     <style type="text/css">
   .main-header{
    background-color:#001f3f;
    color: white;
   }

 </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{route('admin')}}" class="navbar-brand">
        <img src="img/Canva.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light text-white">Delivery</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{route('all-riders-deliveries')}}" class="nav-link text-white">Deliveries</a>
          </li>

                <li class="nav-item">
                <a href="{{route('all-riders-requests')}}" class="nav-link text-white">
                  
                  <p>Requests</p>
                </a>
              </li>

        </ul>

        <!-- SEARCH FORM -->

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
             <img src="img/Canva.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
          </a>
      
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">
            Settings
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           
            <a href="{{route('profile')}}" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Account
              
            </a>
            <div class="dropdown-divider"></div>
          <a href="javascript::" class="dropdown-item" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
               <i class="fas fa-envelope mr-2"></i> 
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
            
          </div>
        </li>

      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
   
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
              <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
                     <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#">
                      <i class="fas fa-plus"></i> New Delivery
                    </a>
                    <br>
                    <br>
                <table id="example1" class="table table-bordered table-striped">


                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Phone</th>
                    <th>Fullname</th>
                    <th>Product Name</th>
                    <th>Rider</th>
                    <th>Requested Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allDeliveries as $request)
                  <tr>
                   
                    <td>{{$loop->iteration}}</td>
                    <td>{{$request->phone}}</td>
                    <td>{{$request->first_name}} {{$request->last_name}}</td>
                    <td>{{$request->product_name}}</td>
                    <td><small class="badge badge-info"> View Rider</small></td>
                    <td>{{$request->created_at}}</td>
                    <td>
                      
                      @if($request->status==0)
                       <small class="badge badge-warning"><i class="far fa-clock"></i> Inactive</small> 
                       
                       @elseif ($request->status==1) 
                       <small class="badge badge-success"><i class="far fa-clock"></i> Accepted</small>
                       @elseif ($request->status==2) 
                       <small class="badge badge-danger"><i class="far fa-clock"></i> Cancelled</small>                
                       @endif
                    </td>
                    <td>
                      <small class="badge badge-danger"> Remove</small>
                    </td>
                    
                  </tr>
                 @endforeach
                  </tbody>
           
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 201-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@include('pages.admin.styles.js')
</body>
</html>
