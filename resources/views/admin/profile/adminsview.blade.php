@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @elseif (Session::has('err'))
                            <div class="alert alert-danger">
                                {{ Session::get('err') }}
                            </div>
                        @endif
                        @if (Auth::guard('admin')->user()->admin_role == 'Manger')
                            <p class="card-description"><a href="{{route('CreateAdmin')}}"> Create </a><code>New Admin Acount</code>
                            </p>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Admin Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($admins as $item)
                                    @if ($item->admin_role == 'subManger')
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{ asset("admin/assets/images/upload/admins/$item->image")}}"
                                                    alt="image" />
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->admin_role }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a class="btn btn-danger" href="{{ route('DeletAdmin', $item->id) }}">Delet
                                                    Admin Acount</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
