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
                Items
            </div>
            <div class="card-body">
                <ul class="list-group">
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection