@extends('layouts\app')

@section('content')
<form action="{{ route('insert.update', $task->id) }}" method="post" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" type="text" value="{{ $task->name }}" placeholder="name" name="name" required>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" type="text" value="{{ $task->price }}" placeholder="price" name="price" required>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" type="text" value="{{ $task->image }}" placeholder="image" name="image" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

@endsection