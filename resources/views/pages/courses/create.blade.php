@extends('layouts\app')

@section('content')

<div class="col-lg-12 text-center mt-2">
    <h1 class="page-title">Add New Student</h1>
</div>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whopps!</strong> There is a problem.
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

<div class="container col-lg-12">


    <div class="col-lg-12 mt-5 ">
        <form role="form" action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-10 mt-2">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Enter student name" name="name" required>
                    </div>
                </div>
                <div class="col-lg-10 mt-2">
                    <div class="form-group mt-2">
                        <input class="form-control" type="text" placeholder="Enter course" name="course" required>
                    </div>
                </div>
                <div class="col-lg-10 mt-2">
                    <div class="form-group mt-2">
                        <input class="form-control" type="number" placeholder="Enter course fee" name="fee" required>
                    </div>
                </div>
                <div class="col-lg-10 mt-3 text-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
<style>
.container{
    margin-left: 200px;
}
</style>
    
@endpush