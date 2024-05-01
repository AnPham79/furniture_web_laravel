@extends('layouts.master')

@section('content')
    <div>
        <style>
            nav svg {
                height: 20px;
            }

            nav .hidden {
                display: block !important;
            }
        </style>
        <div class="container" style="padding:30px 0px">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-md-6">
                                <h2 class="fw-bold">ORDER HISTORY DETAIL</h2>
                            </div>
                            <div class="col-md-6 float-end">
                                <a href="{{ route('order-history') }}" class="btn btn-success float-end mx-1" style="transform: translateY(-40px);">Back</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name Product</th>
                                        <th>Image Product</th>
                                        <th>Regular price</th>
                                        <th>Discount</th>
                                        <th>Quantity</td>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product->name_product }}</td>
                                            <td><img src="{{ $product->product->img_product }}" style="height:100px" alt=""></td>
                                            <td>${{ $product->product->price_product }}.00</td>
                                            <td>${{ $product->invoice->discount }}.00</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->setDateCreated() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding: 30px 0px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="fw-bold">SHIPPING</h2>
                                </div>
                                <div class="col-md-6 float-end">
                                    <a href="{{ route('order-history') }}" class="btn btn-success float-end mx-1">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <table class="table table-tripped">
                                <thead>
                                    <tr>
                                        <th>User name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Province</th>
                                        <th>City</td>
                                        <th>Commune</th>
                                        <th>address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $shipping->user_name }}</td>
                                        <td>{{ $shipping->phone_number }}</td>
                                        <td>{{ $shipping->email }}</td>
                                        <td>{{ $shipping->province }}</td>
                                        <td>{{ $shipping->city }}</td>
                                        <td>{{ $shipping->address }}</td>
                                        <td>{{ $shipping->setDateCreateShipping() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
