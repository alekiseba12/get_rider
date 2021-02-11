<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Requests | Dashboard</title>
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
              <div class="card">
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>National ID</th>
                    <th>Fullname</th>
                    <th>Location</th>
                    <th>Requested Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($sentRequests as $request)
                  <tr>
                   
                    <td>{{$loop->iteration}}</td>
                    <td>{{$request->national_id}}</td>
                    <td>{{$request->firstname}} {{$request->lastname}}</td>
                    <td>{{$request->location}}</td>
                    <td>{{$request->created_at}}</td>
                    <td>
                      
                      @if($request->status==1) 
                       <small class="badge badge-success"> Comfirmed</small>  
                       @else
                       <small class="badge badge-danger"> Cancelled</small>             
                       @endif
                    </td>
                    <td>

                    <a href="javascript"  class="badge badge-info" data-toggle="modal" data-target="#requestId-{{$request->id}}">
                       Edit</a>
                         
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
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@foreach($sentRequests as $requestRider)
<div class="modal fade" id="requestId-{{$requestRider->id}}">
        <div class="modal-dialog">  
          <div class="modal-content bg-default">
            <div class="modal-body">
               <form role="form" action="{{url('cancel-request', array($requestRider->id))}}" method="post">
                @csrf

                <p class="mb-3">Update Request
                </p>
                    <div class="form-group">
                    <label for="shop">Change Status</label>
                    <select class="form-control" name="status" >
                        <option>-----</option>
                          <option value="2">Cancel</option>
                          
                        </select>
                  </div>   
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" id="myRequest" class="btn btn-outline-success">Update</button>
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
