@extends('layouts.app')
@section('title')
    <title>Create New Shop</title>
@endsection
@section('content')
    <div class="text-center my-5">Create New Shop</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">New Shop</div>
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
                    <form action="/shops/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Save</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection