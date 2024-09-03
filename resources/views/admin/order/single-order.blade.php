@extends('admin.layout.masteradmin')




@section('contentt')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                @if (Session::has('done'))
                    <div class="alert alert-success">
                        {{ Session::get('done') }}
                    </div>
                @elseif (Session::has('err'))
                    <div class="alert alert-danger">
                        {{ Session::get('err') }}
                    </div>
                @endif
                @if ($order->Status == 'Pending')
                    <div class='alert alert-info'> Order Pending</div>
                @elseif ($order->Status == 'ordering')
                    <div class='alert alert-info'> Order Accepted</div>
                @elseif ($order->Status == 'complete')
                    <div class='alert alert-info'> Order Completed</div>
                @endif

                <div id="datalisted" class="card">
                    <div class="card-body">
                        <h3 class="">MR/MS: {{ $user->name }} Order`s</h3>
                        <h6>Email : {{ $user->email }}</h6>
                        <h6>Phone : {{ $user->phoneNum }}</h6>
                        <hr>
                        <h3>Order Detailes</h3>
                        <h6><a href="{{ route('product_admin', $order->product_id) }}">{{ $order->product_name }} </a>,
                            {{ $order->size }}</h6>
                        <h6><span style="font-weight:bold">Quantity</span>: {{ $order->quantity }}</h6>
                        <h6><span style="font-weight:bold"> Total Price</span>: {{ $order->TotalAmount }}</h6>
                        <h6><span style="font-weight:bold"> InvoiceNumber</span>: {{ $order->invoice_no }}</h6>

                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @if ($order->Status == 'Pending')
                <a class="btn btn-success" href="{{ route('accept', $order->OrderID) }}">Accept</a>
            @elseif ($order->Status == 'ordering')
                <a class="btn btn-primary" href="{{ route('complete', $order->OrderID) }}">Complete</a>
            @elseif ($order->Status == 'complete')
                <p class="text-success">Oreder is Receved by Cliente </p>
            @endif
            </div>
            <div class="col-lg-6">
                <button onclick="printdata('datalisted')" type="button" class="btn btn-info btn-icon-text"> Print
                    <i class="mdi mdi-printer btn-icon-append"></i>
                </button>
            </div>
        </div>


    </div>
@endsection
