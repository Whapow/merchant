@extends('layouts.app')
@section('title')
    <title>Shop Directory</title>
@endsection
@section('content')
    <h1 class='text-center my-5'> Shop Directory </h1>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">
            Shops
          </div>
          <div class="card-body">
            <ul class="list-group">
              @foreach($shops as $shop)
                <li class="list-group-item"><a href="/shops/{{$shop->id}}">{{ $shop->name }}</a></td>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection