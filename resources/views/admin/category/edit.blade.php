@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Category</h4>
                        @if (Session::has('done'))
                        <div class="alert alert-success">
                        {{Session::get("done")}}
                        </div>
                        @endif
                        <form action="{{ route('UpdateCat',$cate->categoryID) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Name Of Category</label>
                                <input value="{{$cate->categoryName}}" type="text" name="categoryName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <input value="{{$cate->description}}" type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">image</label>
                                <img width="50px" src="{{asset("admin/assets/images/upload/category/$cate->imagepath")}}" alt="">
                                <input  type="file" name="imagepath" class="form-control">
                            </div>
                            <div class=" text-center mt-4">
                                <button class="btn btn-info">Update</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
