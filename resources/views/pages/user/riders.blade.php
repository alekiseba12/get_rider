<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Verfied Riders | Delivery</title>
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
       <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            @foreach($getRiders as $rider)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$rider->firstname .' '. $rider->lastname}}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> {{$rider->description}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$rider->constituency}}, {{$rider->location}}</li><br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +254 {{$rider->phone_number}}</li><br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Registration No #: {{$rider->id}}</li><br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-motorcycle"></i></span> Motorcycle No #:<label class="badge bg-danger">{{$rider->motorcicle_number}}</label></li>
            
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-unlock"></i></span><b>Status: </b><span class="fa fa-circle text-warning pull-right"></span>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{$rider->photo}}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">


                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#requestId-{{$rider->id}}">
                      <i class="fas fa-paper-plane"></i> Request
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer -->
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
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
@foreach($getRiders as $user)
<div class="modal fade" id="riderId-{{$user->id}}">
        <div class="modal-dialog modal-lg">  
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title">Delivery Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form role="form" action="{{url('product-delivery', array($user->id))}}" method="post">
                @csrf
                <h4 class="mb-3"> Buyer Details</h4>
                <hr class="my-4">
                  <div class="row">
                    
                  <div class="col-3">
                     <label> First Name</label>
                    <input type="text" class="form-control" placeholder="" name="first_name">
                  </div>
                  <div class="col-4">
                     <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="" name="last_name">
                  </div>
                  <div class="col-5">
                     <label>Gender</label>
                    <input type="text" class="form-control" placeholder="" name="gender">
                  </div>
                 </div>
                 <br>
                <div class="row">
                    
                  <div class="col-3">
                     <label>Phone Number</label>
                    <input type="text" class="form-control" placeholder="" name="phone">
                  </div>
                  <div class="col-4">
                     <label>Email Address</label>
                    <input type="email" class="form-control" placeholder="" name="email">
                  </div>
                  <div class="col-5">
                     <label>Location Area</label>
                    <input type="text" class="form-control" placeholder="" name="location">
                  </div>
                 </div>

                 <br>
                <div class="row">          
                  <div class="col-12">
                     <label>Product Name</label>
                    <input type="text" class="form-control" placeholder="" name="product_name" >
                  </div>
              
                 </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-success">Submit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>

      @endforeach

      @foreach($getRiders as $request)
<div class="modal fade" id="requestId-{{$request->id}}">
        <div class="modal-dialog">  
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title">Request Rider For Delivery</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form role="form" action="{{url('send-request', array($request->id))}}" method="post">
                @csrf

                <p class="mb-3">Are you sure want to request this rider?
                </p>
                <h4 class="mb-3"> {{$request->firstname .' '. $request->lastname}}</h4>
                <hr class="my-4">
                  
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-outline-success">Yes</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>

      @endforeach

@include('pages.admin.styles.js')
</body>
</html>
