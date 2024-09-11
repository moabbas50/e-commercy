@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div id="datalisted" class="card">
                    <div class="card-body">
                        <img width="350" src="{{ asset('admin/assets/images/upload/News/' . $news->image_url) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                @if (Session::has('done'))
                    <div class="alert alert-success">
                        {{ Session::get('done') }}
                    </div>
                @elseif (Session::has('err'))
                    <div class="alert alert-danger">
                        {{ Session::get('err') }}
                    </div>
                @endif
                {{-- @if ($order->Status == 'Pending')
                    <div class='alert alert-info'> Order Pending</div>
                @elseif ($order->Status == 'ordering')
                    <div class='alert alert-info'> Order Accepted</div>
                @elseif ($order->Status == 'complete')
                    <div class='alert alert-info'> Order Completed</div>
                @endif --}}
                <div id="datalisted" class="card">
                    <div class="card-body">
                        <h3 class="">{{ $news->title }} </h3>
                        <p>  {{ $news->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
