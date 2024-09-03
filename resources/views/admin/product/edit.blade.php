@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Category</h4>
                        @if (Session::has('done'))
                            <div class="alert alert-success">
                                {{ Session::get('done') }}
                            </div>
                        @endif
                        <form action="{{ route('UpdatePro', $product->ProductID) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Product Name</label>
                                <input value="{{ $product->Name }}" type="text" name="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <input value="{{ $product->Description }}" type="text" name="Description"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Price</label>
                                <input value="{{ $product->Price }}" type="number" name="Price" class="form-control"
                                    step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">category</label>
                                <select name="category" class="form-control" aria-label="Default select example">
                                    <option value='{"id":{{ $product->categoryID }},"name":{{ $product->categoryname }}}'
                                        selected>{{ $product->categoryname }}</option>
                                    @foreach ($categories as $item)
                                        <option
                                            value='{"id":{{ $item->categoryID }}, "na   me": "{{ $item->categoryName }}"}'>
                                            {{ $item->categoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" text-center mt-4">
                                <button class="btn btn-info">submit</button>
                            </div>
                        </form>
                        @php
                            $photos = DB::table('photos')
                                ->where('ProductID', '=', $product->ProductID)
                                ->get();
                        @endphp
                        @if (!$photos)
                            <div class="form-group">
                                <div class="row">
                                    @foreach ($photos as $item)
                                        <div class="col-lg-3">
                                            <img width="50px"
                                                src="{{ asset("admin/assets/images/upload/products/$item->PhotoURL") }}"
                                                alt="">
                                        </div>
                                    @endforeach

                                </div>
                                <a href="{{ route('Editphotos', $product->ProductID) }}">Edit Product Photos</a>

                            </div>
                        @else
                            No Images For This Product To Update It
                            <br><br>
                            <a  href="{{ route('product_image', $product->ProductID) }}">Add
                                product`s images</a>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
