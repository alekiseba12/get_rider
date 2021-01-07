@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
             <div>
                @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
             </div>

            <div class="card">
                <div class="card-header">{{ __('Delivery Form') }}</div>

                <div class="card-body">
                    <form class="modal-form" method="POST" action="{{ route('user.delivery.store') }}" enctype="multipart/form-data">
						@csrf
						
                        <div style='display:flex;'>

                            <div class="form-group " style="flex:0.33">
							<label for="first_name">First Name</label>
							<input  type="text" name="first_name" id="first_name" class="form-control"  autocomplete="off" value="{{old('first_name')}}" placeholder="First Name">
                            @if ($errors->has('first_name'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
						</div>

                        <div class="form-group ml-4" style="flex:0.33">
							<label for="last_name">Last Name</label>
							<input  type="text" name="last_name" id="last_name" class="form-control"  autocomplete="off" value="{{old('last_name')}}" placeholder="Last Name">
                            @if ($errors->has('last_name'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
						</div>

                         <div class="form-group ml-4" style="flex:0.33">
							<label for="hotel">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
						</div>

                        </div>

                       

                        <div style='display:flex;'>
                        
                            <div class="form-group" style="flex:0.5">
							<label for="phone">Phone</label>
							<input  type="text" name="phone" id="phone" class="form-control"  autocomplete="off" value="{{old('phone')}}" placeholder="Phone Number">
                            @if ($errors->has('phone'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
						</div>

                        <div class="form-group ml-4" style="flex:0.5">
							<label for="email">Email</label>
							<input  type="text" name="email" id="email" class="form-control"  autocomplete="off" value="{{old('email')}}" placeholder="Email Address">
                            @if ($errors->has('email'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>

                        </div>
                        

                       

                         <div class="form-group">
							<label for="hotel">Location</label>
                            <select name="location" id="location" class="form-control">
                                <option value="Imara Daima">Imara Daima</option>
                                <option value="Karen">Karen</option>
                                <option value="Embakasi East">Embakasi East</option>
                                <option value="Embakasi South">Embakasi South</option>
                            </select>
						</div>

                        <div class="form-group">
							<label for="product_name">Product Name</label>
							<input  type="text" name="product_name" id="product_name" class="form-control"  autocomplete="off" value="{{old('product_name')}}" placeholder="Product Name">
                            @if ($errors->has('product_name'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('product_name') }}</strong>
                                </span>
                            @endif
						</div>
						
						<div align="center" class="form-group">
							<button type="submit" class="btn btn-primary w-50 ">Submit</button>
						</div>
					</form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
