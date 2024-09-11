@extends('admin.layout.masteradmin')

@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create News </h4>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        @endif
                        @if (Session::has('done'))
                            <div class="alert alert-success">
                                {{ Session::get('done') }}
                            </div>
                        @endif
                        <form id="catForm" action="{{ route('CreateNews') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" ad form-group">
                                <label for="" class="form-label">Title</label>
                                <input id="idcatname" type="text" name="title" class="form-control inpp">
                                <span id="catnamerr" style="color:rgb(199, 43, 43);"></span>
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">Content</label>
                                <input id="catdescription" type="text" name="content" class="form-control inpp">
                                <span id="catdescrerr" style="color:rgb(199, 43, 43);"></span>
                            </div>
                            <div class="ad form-group">
                                <label for="" class="form-label">image</label>
                                <input id="catimage" type="file" name="image_url" class="form-control inpp">
                                <span id="imagepatherr" style="color:rgb(199, 43, 43);"></span>
                            </div>
                            <div class=" text-center mt-4">
                                <button type="submit" class="btn btn-info">submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
