@extends('admin.layout.loginlayout')
@section('contentt')
        <div class="card text-center  mt-5" style="width: 28rem;">
            <h2>Login Admin Dashboard</h2>
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
                <form method="POST" action="{{ route('admin_login') }}">
                    @csrf
                    <!-- Email input -->
                        <label class="form-label" for="email">Email address</label>
                        <input id="email" type="text" name="email" required autofocus class="form-control" />
                    <!-- Password input -->
                        <label class="form-label" for="password">Password</label>
                        <input id="password" type="password" name="password" required class="form-control" />
                    <!-- Submit button -->


                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-primary btn-block mb-4 mt-4">Sign
                        in</button>
                        <a class="mt-3" href="{{route('admin_forget_password')}}">Forget Password</a>
                </form>
            </div>
        </div>
        @endsection
