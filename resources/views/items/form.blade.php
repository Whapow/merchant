@extends('layouts.app')
@section('title')
    <title>{{ isset($item) ? "{$item->name} - Edit" : 'Create New Item' }}</title>
@endsection
@section('header')
    <h1 class="text-center my-5">{{ isset($item) ? "{$item->name} - Edit" : 'Create New Item' }}</h1>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ isset($item) ? $item->name : 'New Item'}}</div>
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
                    <form action="{{isset($item) ? route('items.update', $item->id) : route('items.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($item))
                            @method('PUT')
                        @endif
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ isset($item) ? $item->name : ''}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" name="value" id="value" placeholder="Value" value="{{ isset($item) ? $item->value : 0}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ isset($item) ? $item->description : ''}}"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-primary">
                                {{ isset($item) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection