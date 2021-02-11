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
     <style type="text/css">
   .main-header{
    background-color:#001f3f;
    color: white;
   }

 </style>
  <script type="text/javascript">
            $(document).ready(function() {

                $("#constituency").change(function(){

                      $.ajax({
                          url: "constituencies/get_by_constituency/" + $(this).val(),
                          method: 'GET',
                          success: function(data) {
                              $('#location').html(data.html);

                              ConstituencyChange()
                          }
                      });
               });

                 $("#location").change(function(){

                     ConstituencyChange()

               });               
           });
           function ConstituencyChange() {
                  
                   $.ajax({
                          url: "location/cordinates/" +  $('#constituency').val()+"/"+$('#location').val(),
                          method: 'GET',
                          success: function(data) {
                              console.log(data.lat);
                              $('#lat').val(data.lat);
                              $('#longitude').val(data.long);
    
                          }
                      });
            }

             
    </script>
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

                 @if($user->role==1)
                <p class="text-muted text-center">Seller or Buyer</p>
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
                @if(Empty($user->photo))
                   <a href="javascript::" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#userId-{{$user->id}}">
                       Complete Profile
                    </a>
              
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
   
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">More Details</h3>
              </div>
              <!-- /.card-header -->
                 <div class="card-body">
                <strong><i class="fas fa-home mr-1"></i> Shop/Company/Personal</strong>

                <p class="text-muted">
                  {{$user->shop}}
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

                <strong><i class="far fa-file-alt mr-1"></i> Shop/Company Description</strong>

                <p class="text-muted">{{$user->description}}.</p>
                  @if(Empty($user->photo))
                    @else

                     <a href="javascript::" class="btn btn-sm btn-success" data-toggle="modal" data-target="#profileId-{{$user->id}}">
                       Edit Account
                    </a> 
                    @endif
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
@include('pages.user.layouts.footer')
</div>
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
               <form role="form" action="{{url('update-shop_company_owner', array($user->id))}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                    <label for="shop">Shop/Company Name</label>
                    <input type="text" class="form-control" id="shop" placeholder="Provide Shop/Company Name" name="shop">
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

      <div class="modal fade" id="profileId-{{$user->id}}">
        <div class="modal-dialog modal-lg">  
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title">Edit Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form role="form" action="{{url('#', array($user->id))}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                      <div class="col-8">
                    <input type="text" class="form-control" placeholder="Username" value="{{$user->name}}">
                  </div> 
                  
                </div>
                <br>
                  <div class="row">
                  <div class="col-3">
                  <input type="text" class="form-control" placeholder="Firstname" value="{{$user->firstname}}">
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="Lastname" value="{{$user->lastname}}">
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" placeholder="Email Address" value="{{$user->email}}">
                  </div> 
                   <hr class="ms-3">
                   </div>
                  <br>
                  <div class="row">
                  <div class="col-3">
                    <input type="text" class="form-control" placeholder="Gender" value="{{$user->gender}}">
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="Phone Number" value="{{$user->phone_number}}">
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" placeholder="National ID" value="{{$user->national_id}}">
                  </div> 
                   <hr class="ms-3">
                  </div>
                  <br>
                 <div class="row">
                  <div class="col-6">
                    <input type="text" class="form-control" placeholder="Description" value="{{$user->description}}">
                  </div>
                  <div class="col-6">
                    <select class="form-control" name="role" >
                        <option value="{{$user->role}}">Buyer or Seller</option>                   
                        
                        </select>
                    </div>
                   <hr class="ms-3">
                   </div>
                    <br>
                  <div class="row">
                  <div class="col-6">
                     <select class="form-control" name="constituency" id="constituency" >
                        @foreach($constituencies as $id => $constituency)
                        <option value="{{ $id }}">
                            {{ $constituency }}
                        </option>
                    @endforeach
                  </select>
                </div>
                  <div class="col-6">
                    <select class="form-control" name="location" id="location">
                       <option value="">{{ trans('Please select Location') }}</option> 
                         </select>                  
                        
  
                  </div>              
                   <hr class="ms-3">
                  </div>

                  <br>
                  <div class="row">
                  <div class="col-12">
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
                           
                   <hr class="ms-3">
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
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
