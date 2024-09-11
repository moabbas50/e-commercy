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
                        <p class="card-description"><a href="/admin/Addp"> Add </a><code>New product</code>
                        </p>
                        @if ($op == 0)
                            <p class="card-description">
                                The Products of <code> {{ $cat->categoryName }} </code>
                            </p>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>stock</th>
                                        <th>Created by</th>
                                        <th>Modified by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $item)
                                        <tr>
                                            <?php
                                            $imgs = DB::table('photos')
                                                ->where('ProductID', '=', $item->ProductID)
                                                ->first();
                                            ?>
                                            @if ($imgs)
                                                <td class="py-1">
                                                    <img src="{{ asset('admin/assets/images/upload/products/' . $imgs->PhotoURL) }}"
                                                        alt="image" />
                                                </td>
                                            @else
                                                <td class="py-1">
                                                    <img src="{{ asset('admin/assets/images/upload/products/product.png') }}"
                                                        alt="image" />
                                                </td>
                                            @endif

                                            <td>{{ $item->Name }}</td>
                                            @php
                                                $miniDescrip =substr($item->Description,0,20);
                                            @endphp
                                            <td>{{ $miniDescrip.'....' }}</td>
                                            <td>Egp {{ $item->Price }}</td>
                                            <td>{{ $item->stock }}</td>
                                            @if ($item->CreatedByAdminID)
                                                <?php
                                                $admin = DB::table('admins')
                                                    ->where('id', '=', $item->CreatedByAdminID)
                                                    ->first();
                                                $adminName = $admin->name;
                                                ?>
                                                <td>{{ $adminName }}</td>
                                            @else
                                                <td>Admin</td>
                                            @endif

                                            @if ($item->LastModifiedByAdminID)
                                                <?php
                                                $admin = DB::table('admins')
                                                    ->where('id', '=', $item->LastModifiedByAdminID)
                                                    ->first();
                                                $adminName = $admin->name;
                                                ?>
                                                <td>{{ $adminName }}</td>
                                            @else
                                                <td>Admin</td>
                                            @endif
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                        <a class="dropdown-item"
                                                            href="{{ route('product_admin', $item->ProductID) }}">View </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('product_image', $item->ProductID) }}">Add
                                                            product`s images</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('EditPro', $item->ProductID) }}">Edit
                                                            product</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('DeletPro', $item->ProductID) }}">Delet
                                                            product</a>
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
