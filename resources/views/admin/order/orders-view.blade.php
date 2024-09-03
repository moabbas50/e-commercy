@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Orders</h4>
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
                                        <th>Order num.</th>
                                        <th>Order Date</th>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Product Total Amount</th>
                                        <th>Invoice Num.</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $item)
                                        @if ($item->Status == 'Pending')
                                            <tr style="background-color: rgb(231, 68, 68)">
                                            @elseif ($item->Status == 'ordering')
                                            <tr style="background-color:  rgb(233, 233, 53)">
                                            @elseif ($item->Status == 'complete')
                                            <tr style="background-color: rgb(38, 182, 86)">
                                        @endif
                                        <td>{{ $item->OrderID }}</td>
                                        <td>{{ $item->OrderDate }}</td>
                                        <td> <a
                                                href="{{ route('product_admin', $item->product_id) }}">{{ $item->product_name }}</a>
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->TotalAmount }}</td>
                                        <td>{{ $item->invoice_no }}</td>
                                        <td>
                                            <a  class="btn btn-success" href="{{ route('order', $item->OrderID) }}">View </a>
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
