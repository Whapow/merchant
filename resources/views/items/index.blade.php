@extends('layouts.app')
@section('title')
    <title>Item Directory</title>
@endsection
@section('header')
    <h1 class='text-center my-5'> Item Directory </h1>
@endsection
@section('content')
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">
            Items
            <a href="{{ route('items.create') }}"><i class="bi bi-plus-circle-fill mx-2"></i></a>
          </div>
          <div class="card-body">
            @if ($items->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset($item->image) }}" width="60px" height="60px">
                                </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->value }} </td>
                                <td>
                                    @if(!$item->trashed())
                                        <a href="{{ route('items.edit', $item->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    @else
                                        <form action="{{ route('items.restore', $item->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('items.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{ $item->trashed() ? 'Delete' : 'Trash' }}
                                        </button>
                                        {{-- <button class="btn btn-danger btn-sm" onclick="handleDelete({{$item->id}})">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No Items Available</h3>
            @endif
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="deleteItemForm">
                        @metod('DELETE')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">Are you sure you want to delete this item?</p>
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
            var form = document.getElementById('deleteItemForm')
            form.action = '/items/' + id 
            $('#deleteModal').modal('show')
        }
    </script>
@endsection