@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Images to {{$product->Name}}</h4>
                        @if (Session::has('done'))
                        <div class="alert alert-success">
                        {{Session::get("done")}}
                        </div>
                        @endif
                        <form action="{{ route('AddPro_image',$productid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="ad form-group">
                                <label for="" class="form-label">Image 1</label>
                                <input  type="file" name="imagepath1" class="form-control inpp">
                                {{-- <span id="imagepatherr" style="color:rgb(199, 43, 43);"></span> --}}
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">Image 2</label>
                                <input  type="file" name="imagepath2" class="form-control inpp">
                                {{-- <span id="imagepatherr" style="color:rgb(199, 43, 43);"></span> --}}
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">Image 3</label>
                                <input  type="file" name="imagepath3" class="form-control inpp">
                                {{-- <span id="imagepatherr" style="color:rgb(199, 43, 43);"></span> --}}
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">Image 4</label>
                                <input  type="file" name="imagepath4" class="form-control inpp">
                                {{-- <span id="imagepatherr" style="color:rgb(199, 43, 43);"></span> --}}
                            </div>
                            <div class=" text-center mt-4">
                                <button class="btn btn-info">submit</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
