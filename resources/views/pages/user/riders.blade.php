<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Dashbaord </title>
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
      <a href="{{route('dashbaord')}}" class="navbar-brand">
        <img src="img/Canva.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">

      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
        </ul>

        <!-- SEARCH FORM -->

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
             @if(empty($user->photo))
             <img src="img/empty.jpg" alt="User Photo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
             @else
              <img src="{{$user->photo}}" alt="User Photo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
             @endif
          </a>
        
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">
            Settings
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="{{route('requests')}}" class="dropdown-item">
              <i class="fas fa-motorcycle mr-2"></i> Requests
              
            </a>
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
          <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Active Riders</h4>
          </div>

        </div>
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
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-motorcycle"></i></span> Motorcycle No #:   <span style="color:red; font-size: 14px; ">{{$rider->motorcicle_number}} </span></li>
            
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

                   
                        <span style="color:green; font-size: 14px; ">23 Km away</span>
                           &ensp;&ensp;
                         

 <!--<button id="cancel-{{$rider->id}}" class="btn btn-sm btn-danger hidden" onclick="$('#request-{{$rider->id}}').show(),$('#cancel-{{$rider->id}}').hide()">

                     Cancel </button> -->     
                         <a href="javascript::" class="btn btn-sm btn-primary" onclick="event.preventDefault();
                              document.getElementById('send-request-form').submit();">
                        <i class="fas fa-paper-plane"></i> Request
                      </a>
     
                           <form id="send-request-form" action="{{url('send-request', array($rider->id))}}" method="POST" style="display: none;">
                           @csrf
                          </form> 
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
@include('pages.user.layouts.footer')
</div>
      @foreach($getRiders as $request)
<div class="modal fade" id="requestId-{{$request->id}}">
        <div class="modal-dialog">  
          <div class="modal-content bg-default">
            <div class="modal-body">
               <form role="form" action="{{url('send-payment', array($request->id))}}" method="post">
                @csrf

                <p class="mb-3">To unlock the rider, you have to make the payment fee.
                </p>           
                  <b>Rider ID:</b> #{{$request->id}}<br>
                  <b>Payment Amount:</b> Ksh 50<br>
                  
                <br>
                <p class="mb-3" style="font-style: italic;">Non-Refundable,  once the payment has been done!.
                </p> 
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" id="myRequest" class="btn btn-outline-success">Proceed</button>
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
