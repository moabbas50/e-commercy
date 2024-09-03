@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Images of {{ $Product->Name }}</h4>
                        @if (Session::has('done'))
                            <div class="alert alert-success">
                                {{ Session::get('done') }}
                            </div>
                        @elseif (Session::has('err'))
                            <div class="alert alert-danger">
                                {{ Session::get('err') }}
                            </div>
                        @endif
                        <form action="{{ route('UpdatePhoto', $Product->ProductID) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($photos)
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($photos as $item)
                                    <div class="ad form-group">
                                        <label for="" class="form-label">Image {{ $counter }}</label>
                                        <input type="file" name="imagepath{{ $counter }}" class="form-control inpp">
                                        <input type="text" hidden value="{{ $item->PhotoID }}"
                                            name="PhotoID{{ $counter }}">
                                        {{-- <span id="imagepatherr" style="color:rgb(199, 43, 43);"></span> --}}
                                        <img width="50px"
                                            src="{{ asset("admin/assets/images/upload/products/$item->PhotoURL") }}"
                                            alt="">
                                    </div>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            @endif
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
