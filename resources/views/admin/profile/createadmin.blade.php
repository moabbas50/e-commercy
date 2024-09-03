@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">create Admin Account</h4>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        @endif
                        @if (Session::has('success'))
                            <li class="text-success">{{ Session::get('success') }}</li>
                        @endif
                        <form id="myForm" action="{{ route('creatAd') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="ad form-group">
                                <label for="" class="form-label">Name </label>
                                <input id="name" type="text" name="name" class="form-control inp">
                                <span id="nameError" style="color:rgb(199, 43, 43);"></span>
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">Email</label>
                                <input id="email" type="email" name="email" class="form-control inp">
                                <span id="emailError" style="color:rgb(199, 43, 43);"></span>
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">Password</label>
                                <input id="password" type="password" name="password" class="form-control inp">
                                <span id="passwordError" style="color:rgb(199, 43, 43);"></span>
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">Confirm Password</label>
                                <input id="passwordConfirm" type="password" name="password_confirmed"
                                    class="form-control inp">
                                <span id="passwordCError" style="color:rgb(199, 43, 43);"></span>
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class=" text-center mt-4">
                                <button type="submit" class="btn btn-info">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
