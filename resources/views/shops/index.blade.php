@extends('layouts.app')
@section('title')
    <title>Shop Directory</title>
@endsection
@section('header')
    <h1 class='text-center my-5'> Shop Directory </h1>
@endsection
@section('content')
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">
            Shops
            <a href="{{ route('shops.create') }}"><i class="bi bi-plus-circle-fill mx-2"></i></a>
          </div>
          <div class="card-body">
            @if ($shops->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shops as $shop)
                            <tr>
                                <td> {{ $shop->name }} </td>
                                <td>
                                    @if(!$shop->trashed())
                                        <a href="{{ route('shops.edit', $shop->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    @else
                                        <form action="{{ route('shops.restore', $shop->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('shops.destroy', $shop->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{ $shop->trashed() ? 'Delete' : 'Trash' }}
                                        </button>
                                        {{-- <button class="btn btn-danger btn-sm" onclick="handleDelete({{$shop->id}})">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No Shops Available</h3>
            @endif
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="deleteShopForm">
                        @metod('DELETE')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Shop</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">Are you sure you want to delete this shop?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function handleDelete(id){
            var form = document.getElementById('deleteShopForm')
            form.action = '/shops/' + id 
            $('#deleteModal').modal('show')
        }
    </script>
@endsection