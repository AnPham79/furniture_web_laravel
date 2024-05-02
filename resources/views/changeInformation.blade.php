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
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/avt') }}/{{ $user->avatar }}" class="rounded-circle" style="width:300px; height:300px" alt>
                <h2 class="fw-bold my-2" style="font-size: 20px;">{{ $user->name }}</h2>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="fw-bold">Your Profile</h2>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success float-end">Back</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert aler-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" action="{{ route('process-change-information') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-2">
                                <label class="label-control" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group my-2">
                                <label class="label-control" for="avatar">Avatar</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" value="{{ $user->avatar }}">
                            </div>

                            <div class="form-group my-2">
                                <label class="label-control" for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>

                            <div class="form-group my-2">
                                <label class="label-control" for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                            </div>

                            <div class="form-group my-2">
                                <label class="label-control" for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                            </div>

                            <div class="form-group my-2">
                                <button type="submit" class="btn btn-success float-end">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
