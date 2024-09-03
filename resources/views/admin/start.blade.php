@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">

            <h3 class="mb-0"> Hi {{ Auth::guard('admin')->user()->name }}, welcome back!<span
                    class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your web analytics dashboard template.</span>
            </h3>

        </div>

        <h3>
            @if (Session::has('error'))
                <li class="text-danger">{{ Session::get('error') }}</li>
            @endif
        </h3>


    </div>
@endsection
