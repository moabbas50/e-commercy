@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="page-header flex-wrap">

                <div class="nav-profile-image">
                    <img width="50%"
                        src="{{ asset('admin/assets/images/upload/admins/' . Auth::guard('admin')->user()->image) }}"
                        alt="profile" />
                </div>
                <div class="d-flex ">
                    <a class="btn btn-sm ml-3 btn-success "
                        href="{{ route('EditAdmin', Auth::guard('admin')->user()->id) }}">Edit </a>
                </div>
            </div>
            <div class="page-header flex-wrap">
                <h3 class="mb-0 "> {{ Auth::guard('admin')->user()->name }}
                </h3>
            </div>
            <div class="page-header flex-wrap">
                <h3 class="mb-0 "><span
                        class="pl-0 h6 pl-sm-2 text-muted d-inline-block">{{ Auth::guard('admin')->user()->email }}</span>
                </h3>
            </div>
            <div class="page-header flex-wrap">
                <div>
                    <h3>
                        <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"> Create at :
                            {{ Auth::guard('admin')->user()->created_at }}</span>
                    </h3>
                </div>
            </div>
            <div class="page-header flex-wrap">
                <div>
                    <h3>
                        <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"> Position :
                            {{ Auth::guard('admin')->user()->admin_role }}</span>
                    </h3>
                </div>
            </div>
        </div>



    </div>
@endsection
