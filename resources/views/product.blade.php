@extends('layout.master')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        @if ($op == 1)
                            <ul>
                                <li class="active" data-filter="*">All</li>
                                <li data-filter=".Electronics">Electronics</li>
                                <li data-filter=".Books">Books</li>
                                <li data-filter=".Clothing">Clothing</li>

                            </ul>
                        @else
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2 text-center">
                                    <div class="breadcrumb-text">
                                        @if (Session::has('success'))
                                            <li class="text-success">{{ Session::get('success') }}</li>
                                        @endif
                                        @if ($products->isEmpty())
                                            <p style="font-size: 50px">{{ $catName->categoryName }}</p>
                                            <p style="">NO Product In This Category</p>
                                        @else
                                            <p style="font-size: 50px">{{ $products[0]->categoryname }}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row product-lists">

                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center {{ $item->categoryname }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ url('singleproduct') . '/' . $item->ProductID }}"><img
                                        src="{{ url('assets/img/products/product-img-2.jpg') }}" alt=""></a>
                            </div>
                            <h3>{{ $item->Name }}</h3>
                            <p class="product-price"><span>Price</span> {{ $item->Price }}</p>


                            <form action="{{url('AddCart')}}" method="POST" >
                                @csrf
                                <input hidden type="text" name="productId" value="{{ $item->ProductID}}"
                                    class="form-control inp">
                                <input hidden value="1" name="quantity" type="number" placeholder="0">
                                <br>
                                <button  class="bordered-btnn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </form>


                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->
@endsection
