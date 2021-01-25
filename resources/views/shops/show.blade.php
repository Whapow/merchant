@extends('layouts.app')
@section('title')
<title>{{ $shop->name }}</title>
@endsection
@section('header')
    <h1 class='text-center my-5'> {{ $shop->name }} </h1>
@endsection
@section('content')
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
        </div>
    </div>
</div>
@endsection