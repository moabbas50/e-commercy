@extends('admin.layout.loginlayout')
@section('contentt')










    <div class="card text-center  mt-5" style="width: 28rem;">
        <h2>rest Password</h2>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            @endif
            @if (Session::has('error'))
                <li class="text-danger">{{ Session::get('error') }}</li>
            @endif
            @if (Session::has('success'))
                <li class="text-success">{{ Session::get('success') }}</li>
            @endif
            <form method="POST" action="{{ route('admin_rest_password_submit') }}">
                @csrf
                <!-- Email input -->
                <input type="hidden" name="remember_token" value="{{$remember_token}}" class="form-control" />
                <input type="hidden" name="email" value="{{$email}}" class="form-control" />
                <label class="form-label" for="email">Password</label>
                <input id="password" type="password" name="password" required class="form-control" />
                <label class="form-label" for="email">Confirm Password</label>
                <input id="password" type="password" name="password_Confirmation" required class="form-control" />
                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                    class="btn btn-primary btn-block mb-4 mt-4">Submit</button>
            </form>
        </div>
    </div>







@endsection
