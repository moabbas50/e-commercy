@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        @if (Session::has('done'))
                            <div class="alert alert-success">
                                {{ Session::get('done') }}
                            </div>
                        @elseif (Session::has('err'))
                            <div class="alert alert-danger">
                                {{ Session::get('err') }}
                            </div>
                        @endif
                        <p class="card-description"><a href="{{route('VAddNews')}}"> Add </a><code>New News</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>News Title</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($news as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            @php
                                                $miniDisc = substr($item->content, 0, 50);
                                            @endphp
                                            <td>{{ $miniDisc . '.....' }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"> View </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                        <a class="dropdown-item"
                                                            href="{{ route('ViewNew', $item->id) }}">View </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('EditView', $item->id) }}">Edit News</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('deletNew', $item->id) }}">Delet News</a>
                                                    </div>
                                                </div>
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
