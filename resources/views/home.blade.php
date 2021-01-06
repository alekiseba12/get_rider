<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @include('pages.user.layouts.title')
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  @include('pages.user.styles.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 @include('pages.user.layouts.navigation')
  <!-- /.navbar -->
 @include('pages.user.layouts.sidebar')
  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if(empty($user->photo))
                  <img class="profile-user-img img-fluid img-circle"
                       src="img/empty.jpg"
                       alt="User profile picture">
                      @else
                     <img class="profile-user-img img-fluid img-circle"
                       src="{{$user->photo}}"
                       alt="User profile picture">
                       @endif
                </div>

              
                <h3 class="profile-username text-center">{{$user->firstname .' '. $user->lastname}}</h3>
                 @if($user->role==2)
                <p class="text-muted text-center">Rider</p>
                @endif

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone No</b> <a class="float-right">+254 {{$user->phone_number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$user->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">{{$user->gender}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>National ID</b> <a class="float-right">{{$user->national_id}}</a>
                  </li>
                </ul>
                 @if(empty($user->photo))
                <a href="javascript:;" class="btn btn-danger btn-block" data-toggle="modal" data-target="#userId-{{$user->id}}"><b>Complete Profile</b></a>
                @else
                <a href="#" class="btn btn-success btn-block"><b>View Available Deliveries</b></a>
                @endif


             
              </div>
              <!-- /.card-body -->
            </div>
       
        
            <!-- /.card -->

            <!-- About Me Box -->
          
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
          <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Active Delivery</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>44</h3>

                <p>Cancelled Deliveries</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>65</h3>

                <p>Customers/Companies</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">More Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-home mr-1"></i> Motorcycle No</strong>

                <p class="text-muted">
                  {{$user->motorcicle_number}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Constituency</strong>

                <p class="text-muted">{{$user->constituency}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Location Area</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">{{$user->location}}</span>
                  
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Personal Description</strong>

                <p class="text-muted">{{$user->description}}.</p>
              </div>
              <!-- /.card-body -->
            </div>

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
@include('pages.user.layouts.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="modal fade" id="userId-{{$user->id}}">
        <div class="modal-dialog modal-lg">  
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title">Complete Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form role="form" action="{{url('update-user', array($user->id))}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                    <label for="shop">Motorcycle No</label>
                    <input type="text" class="form-control" id="shop" placeholder="Provide Motorcycle No" name="motorcicle_number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Profile Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
              </div>
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


<!-- jQuery -->
@include('pages.user.styles.js')
</body>
</html>
