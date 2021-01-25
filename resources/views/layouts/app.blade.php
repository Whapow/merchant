<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
        @yield('title')
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Merchant</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shops.index') }}">Shops</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('items.index') }}">Items</a>
                            </li>
                            <div class="btn-group">
                                <button type="button" class="btn">Shops</button>
                                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only"></span>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ route('shops.create') }}">Create New</a>
                                  <a class="dropdown-item" href="{{ route('shops.trash') }}">View Trash</a>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn">Items</button>
                                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only"></span>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ route('items.create') }}">Create New</a>
                                  <a class="dropdown-item" href="{{ route('items.trash') }}">View Trash</a>
                                </div>
                            </div>
                        </ul>
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <a class="nav-link" href="#">Logout</a>
                        </ul>
                    @else
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                        </ul>
                    @endauth
                </div>
            </div>
        </nav>
        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    @yield('header')
                </div>
            </div>
            @auth
                {{-- <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Shops
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8"> --}}
                        @yield('content')
                    {{-- </div>
                </div> --}}
            @else
                @yield('content')
            @endauth
        </div>
        @yield('scripts')
    </body>
</html>