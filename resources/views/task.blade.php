@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks Form') }}</div>

                <div class="card-body">
                  <form method="post" action="{{route('submit-task')}}">
                    @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                   
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="name">
                  </div>
                  <div class="mb-3">
                    <label for="task" class="form-label">Task Name</label>
                    <input type="text" class="form-control" id="username" name="task">
                  </div>
                   <div class="mb-3">
                    <label for="task" class="form-label">Task Date</label>
                    <input type="date" class="form-control" id="username" name="created_at">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
