@extends('layouts.app')
@section('title')
    <title>{{ isset($shop) ? "{$shop->name} - Edit" : 'Create New Shop' }}</title>
@endsection
@section('header')
    <h1 class="text-center my-5">{{ isset($shop) ? "{$shop->name} - Edit" : 'Create New Shop' }}</h1>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ isset($shop) ? $shop->name : 'New Shop'}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{isset($shop) ? route('shops.update', $shop->id) : route('shops.store')}}" method="POST">
                        @csrf
                        @if(isset($shop))
                            @method('PUT')
                        @endif
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ isset($shop) ? $shop->name : ''}}">
                        </div>
                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-primary">
                                {{ isset($shop) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection