<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @include('pages.admin.layouts.title')
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  @include('pages.admin.styles.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 @include('pages.admin.layouts.navigation')
  <!-- /.navbar -->
 @include('pages.admin.layouts.sidebar')
  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Verified Riders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Riders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if ($errors->any())
  <div class="col-sm-8">
    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
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
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{$rider->photo}}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-success">
                      Active
                    </a>

                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#requestId-{{$rider->id}}">
                      <i class="fas fa-paper-plane"></i> Send Request
                    </a>
                       <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#riderId-{{$rider->id}}">
                      <i class="fas fa-envelope"></i> Send Delivery Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('pages.admin.layouts.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
