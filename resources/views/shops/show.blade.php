@extends('layouts.app')
@section('title')
<title>{{ $shop->name }}</title>
@endsection
@section('content')
<h1 class='text-center my-5'> {{ $shop->name }} </h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                <span>Items</span>
                {{-- <i class="plus-circle-fill"></i> --}}
                <span class="float-right">{{ $shop->gold }}</span>
            </div>
            <div class="card-body">
                <ul class="list-group">
                </ul>
            </div>
            <a class="btn btn-info my-2" href="/shops/{{$shop->id}}/edit">Edit</a>
            <a class="btn btn-danger my-2" href="/shops/{{$shop->id}}/delete">Delete</a>
        </div>
    </div>
</div>
@endsection