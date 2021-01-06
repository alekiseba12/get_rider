@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-center text-white">{{ __('Registration Form') }}</div>

                <div class="card-body">
                    <main>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
    <div class="row g-3">
      <div class="col-md-7 col-lg-12">
        <h4 class="mb-3">Account Info</h4>
         <hr class="my-4">
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Username</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                          @error('name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                             </span>
                            @enderror
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Email Address</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
        </div>
         <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Confirm Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
        </div>
        <br>
          <h4 class="mb-3">Personal Info</h4>
         <hr class="my-4">
             <div class="row g-3">
            <div class="col-sm-4">
              <label for="firstName" class="form-label">First Name</label>
              <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autocomplete="firstname">

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="invalid-feedback">
                Valid First name is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="lastName" class="form-label">Last Name</label>
              <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" required autocomplete="lastname">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="invalid-feedback">
                Valid Last Name is required.
              </div>
            </div>
               <div class="col-sm-4">
              <label for="gender" class="form-label">Gender</label>
              <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender">

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="invalid-feedback">
                Valid Gender is required.
              </div>
            </div>
        </div>

         <div class="row g-3">
            <div class="col-sm-4">
              <label for="phone_number" class="form-label">Phone Number</label>
              <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="invalid-feedback">
                Valid Phone Number is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="lastName" class="form-label">National ID</label>
             <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" required autocomplete="national_id">

                                @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="invalid-feedback">
                Valid Kenya National ID is required.
              </div>
            </div>


            <div class="col-sm-4">
              <div>
              <label for="lastName" class="form-label">Choose Operation Type</label>
            </div>
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="role" id="rider" value="2" >
              <label class="form-check-label" for="inlineRadio1">Rider</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="role" id="shop" value="1" >
              <label class="form-check-label" for="inlineRadio2">Shop/Company </label>
            </div>
          
            
              <div class="invalid-feedback">
                Valid Operator is required.
              </div>
            </div>
             
        </div>
          <br>         
           <div class="row g-3">
            <div class="col-sm-12 form-floating" >
              <textarea class="form-control  @error('description') is-invalid @enderror" placeholder="Only 200 Characters" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
              <label for="floatingTextarea2">Small Description About You</label>
              </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="invalid-feedback">
                Valid Motorcycle Number is required.
              </div>
            </div>
             
        </div>
        

             <br>
          <h4 class="mb-3">Location Info</h4>
         <hr class="my-4">

           <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Select Constituency</label>
              <select class="form-select" id="constituency" required name="constituency">
                <option value="">Choose...</option>
                <option value="Dagoretti North">Dagoretti North</option>
                <option value="Dagoretti South">Dagoretti South</option>
                <option value="Embakasi Central">Embakasi Central</option>
                <option value="Embakasi East">Embakasi East</option>
                <option value="Embakasi North">Embakasi North</option>
                <option value="Embakasi South">Embakasi South</option>
                <option value="Kamukunji">Kamukunji</option>
                <option value="Kasarani">Kasarani</option>
                <option value="Kibra">Kibra</option>
                <option value="Langata">Langata</option>
                <option value="Makadara">Makadara</option>
                <option value="Roysambu">Roysambu</option>
                <option value="Ruaraka">Ruaraka</option>
                <option value="Starehe">Starehe</option>
                <option value="Westlands">Westlands</option>
              </select>
              <div class="invalid-feedback">
                Valid Constituency is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Located Area</label>
             <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" required autocomplete="phone_number">

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="invalid-feedback">
                Valid Located Area is required.
              </div>
            </div>
             
        </div>


        <br>
          <button class=" btn btn-primary btn-lg" type="submit">Submit Details</button>
        </form>
      </div>
    </div>
</form>
  </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
