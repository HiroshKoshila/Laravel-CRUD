@extends('layouts\app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">This is Insert</h1>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('insert.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                 <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="price" name="price" required>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="image" name="image" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ ++$key }},{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->price }}</td>
                            <td>{{ $task->image }}</td>
                            <td>
                                @if ($task->status == 0)
                                    <span class="badge bg-warning">Not Available</span>
                                @else
                                    <span class="badge bg-success">Available</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('insert.delete',$task->id) }}" class="btn btn-danger">delete</a>
                                <a href="{{ route('insert.active',$task->id) }}" class="btn btn-success">update</a>
                                <a href="javascript:void(0)" class="btn btn-warning" onclick="taskEditModel({{ $task->id }})">update</a>
                            </td>
                        </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="insertEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertEditLabel">Update item data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="insertEditContent">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>


@endsection

@push('css')
    <style>
        .page-title{
        padding-top: 10px;
        color: #073b66;
    }
    </style>
@endpush

@push('js')
    <script>
        function taskEditModel(it_id){
            var data = {
                it_id: it_id;
            };
            $.ajax({
                url: "{{ route('insert.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function (response){
                    $('#insertEdit').modal('show');
                    $('#insertEditContent').html(response);
                }
            });
        }
    </script>
@endpush
