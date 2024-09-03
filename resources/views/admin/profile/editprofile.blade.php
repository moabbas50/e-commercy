@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit profile</h4>
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                        {{Session::get("success")}}
                        </div>
                        @endif
                        <form action="{{ route('UpdateAdmin',$admin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Name </label>
                                <input value="{{$admin->name}}" type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Email</label>
                                <input value="{{$admin->email}}" type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">image</label>
                                <img width="50px" src="{{asset("admin/assets/images/upload/admins/$admin->image")}}" alt="">
                                <input  type="file" name="image" class="form-control">
                            </div>
                            <div class=" text-center mt-4">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
