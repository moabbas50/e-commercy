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
                        <p class="card-description"><a href="{{route('CreateC')}}"> Add </a><code>New Category</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>category Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $item)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{asset("admin/assets/images/upload/category/$item->imagepath")}}"
                                                    alt="image" />
                                            </td>
                                            <td>{{ $item->categoryName }}</td>
                                            @php
                                              $miniDisc=substr($item->description,0,50);
                                            @endphp
                                            <td>{{ $miniDisc.'.....' }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"> View </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                        <a class="dropdown-item" href="{{route('cat_product_admin',$item->categoryID)}}">View Category`s Products</a>
                                                        <a class="dropdown-item" href="{{ route('EditCat', $item->categoryID) }}">Edit Category</a>
                                                        <a class="dropdown-item" href="{{ route('DeletCat', $item->categoryID) }}">Delet Category</a>
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
