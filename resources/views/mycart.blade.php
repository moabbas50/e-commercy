@extends('layout.master')

@section('content')

    <div class="breadcrumb-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>Your Shopping Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-section mt-100 mb-100">

        <div class="container">
            <h3>cart</h3>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            @endif
            @if (Session::has('success'))
                <li class="text-success">{{ Session::get('success') }}</li>
            @endif

            <table class="table table-striped table-dark mt-5">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartproduct as $item)
                        @if ($item->state == 'ready to buy')
                            <tr style="background-color: rgb(231, 68, 68)">
                            @elseif ($item->state == 'Pending')
                            <tr style="background-color:  rgb(233, 233, 53)">
                            @elseif ($item->state == 'Confirmed')
                            <tr style="background-color: rgb(38, 182, 86)">
                        @endif
                        <td>{{ $item->product_name }}</td>
                        <td>
                            <!-- Update quantity form -->
                            <form action="{{ route('updateCart', $item->cartitem_id) }}" method="POST">
                                @csrf
                                {{ $item->products_qnt }}
                                <input type="number" name="quantity" value="{{ $item->products_qnt }}" min="1"
                                    class="form-control">

                                <button @if ($item->state == 'Confirmed') disabled @endif type="submit"
                                    class="btn btn-primary">Update</button>
                            </form>
                        </td>
                        <td>${{ $item->Product_price }}</td>
                        <td>${{ $item->total_price }}</td>
                        <td>

                            <!-- Remove item from cart -->
                            <form action="{{ route('deletitem', $item->cartitem_id) }}">
                                @csrf

                                @if ($item->state == 'Confirmed')
                                    <button disabled type="submit" class="btn btn-danger">Remove</button>
                                    @else
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                @endif
                            </form>
                            <!-- Remove item from cart -->
                            <br>
                            @if ($item->state == 'ready')
                                <form action="{{ route('buyitem', $item->cartitem_id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Buy Now</button>
                                </form>
                            @elseif ($item->state == 'Pending')
                                <form action="{{ route('confirmeitem', $item->cartitem_id) }}">
                                    @csrf
                                    <p style="color: white">You need to Confirme Your Oreder</p>
                                    <button type="submit" class="btn btn-success">Confirme</button>
                                </form>
                            @elseif ($item->state == 'Confirmed')
                                <p style="color: white">Your purchase is being processed.</p>
                            @endif
                        </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <div class="text-right">
                    <h3>Total: ${{ Cart::subtotal() }}</h3>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
                </div> --}}

        </div>

    </div>
@endsection
