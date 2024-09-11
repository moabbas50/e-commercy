@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit About Infofrmation</h4>
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
                        <form action="{{ route('UpdateAbout', $about->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">title</label>
                                <input value="{{ $about->title }}" type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <input value="{{ $about->description }}" type="text" name="description"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">mission</label>
                                <input value="{{ $about->mission }}" type="text" name="mission" class="form-control"
                                    step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">vision</label>
                                <input value="{{ $about->vision }}" type="text" name="vision" class="form-control"
                                    step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Email</label>
                                <input value="{{ $about->contact_email }}" type="text" name="contact_email"
                                    class="form-control" step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Phone</label>
                                <input value="{{ $about->contact_phone }}" type="text" name="contact_phone"
                                    class="form-control" step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">image</label>
                                <img width="50px"
                                    src="{{ asset("admin/assets/images/$about->image_url") }}"
                                    alt="">
                                <input type="file" name="image_url" class="form-control">
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
