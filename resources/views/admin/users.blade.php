@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>
                        @if (Session::has('done'))
                            <div class="alert alert-success">
                                {{ Session::get('done') }}
                            </div>
                        @elseif (Session::has('err'))
                            <div class="alert alert-danger">
                                {{ Session::get('err') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th> Name</th>
                                        <th>email </th>
                                        <th>Phone</th>

                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $item)
                                        <tr>


                                            <td>{{ $item->name }}</td>

                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phoneNum }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                @if ($item->blocked==true)
                                                <a class="btn btn-info"
                                                href="{{ route('unblockUsers', $item->id) }}">Unblock </a>
                                                @elseif ($item->blocked==false)
                                                <a class="btn btn-danger"
                                                href="{{ route('blockUsers', $item->id) }}">Block </a>
                                                @endif

                                            </td>
                                        </tr>
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
