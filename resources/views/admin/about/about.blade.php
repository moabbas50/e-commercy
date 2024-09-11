@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        @if (Session::has('done'))
            <div class="alert alert-success">
                {{ Session::get('done') }}
            </div>
        @elseif (Session::has('err'))
            <div class="alert alert-danger">
                {{ Session::get('err') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div id="datalisted" class="card">
                    <div class="card-body">
                        <img src="{{ asset('admin/assets/images/' . $about->image_url) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div id="datalisted" class="card">
                    <div class="card-body">
                        <h3 class="">{{ $about->title }} </h3>
                        <h6>{{ $about->mission }}</h6>
                        <h6>{{ $about->vision }}</h6>
                        <h6>Email: {{ $about->contact_email }}</h6>
                        <h6>Phone:{{ $about->contact_phone }}</h6>
                        <p>{{ $about->description }} </p>
                        <a href="{{ route('EditAbout', $about->id) }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
