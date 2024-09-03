@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Product</h4>
                        @if (Session::has('done'))
                        <div class="alert alert-success">
                        {{Session::get("done")}}
                        </div>
                        @endif
                        <form action="{{ route('creatPro') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" name="ProductName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">stock</label>
                                <input type="number" name="stock" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">category</label>
                                <select name="category" class="form-control" aria-label="Default select example">
                                    @foreach ($categories as $item)
                                    <option value='{"id":{{$item->categoryID}}, "name": "{{$item->categoryName}}"}'>{{$item->categoryName}}</option>

                                    @endforeach
                                  </select>
                            </div>
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
