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
                            <h2 class="fw-bold">ORDER HISTORY</h2>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('message'))
                                <div class="alert aler-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <table class="table table-triped">
                                <thead>
                                    <tr>
                                        
                                        <th>User name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Total Price</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->user_name }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>${{ $item->discount }}</td>
                                            <td>{{ $item->status_invoices }}</td>
                                            <td>${{ $item->total_price }}</td>
                                            <td>{{ $item->setDateCreateOrder() }}</td>
                                            <td class="d-flex">
                                                @if ($item->status_invoices === \App\Enums\InvoiceStatusEnum::CHO_XAC_NHAN)
                                                    <form action="{{ route('cancel-order', ['id' => $item->id]) }}"
                                                        method="POST">
                                                        {{-- không có csrf là ăn lỗi 419 --}}
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="border-0 bg-light"><i class="fa-solid fa-ban text-danger"></i></button>
                                                    </form>
                                                @else
                                                    <p class="text-secondary" style="font-size: 13px; transform: translateY(3px);">{{ \App\Enums\InvoiceStatusEnum::getDescription($item->status_invoices) }}</p>
                                                @endif
                                                <a href="{{ route('order-detail', ['id' => $item->id]) }}"><button class="border-0 bg-light"><i class="fa-solid fa-eye text-primary"></i></button></a>
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
