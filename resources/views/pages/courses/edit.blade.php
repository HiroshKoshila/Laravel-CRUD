@extends('layouts\app')

@section('content')

<div class="col-lg-12 text-center mt-2">
    <h1 class="page-title">Edit Details</h1>
</div>

<div class="container col-lg-12">



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
        

    <div class="col-lg-12 mt-5">
        <form role="form" action="{{ route('course.update',$course->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-10 mt-2">
                    <strong> Student Name:</strong>
                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $course->name }}" placeholder="Enter student name" name="name" required>
                    </div>
                </div>
                <div class="col-lg-10 mt-2">
                    <strong> Course Name:</strong>
                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $course->course }}" placeholder="Enter course" name="course" required>
                    </div>
                </div>
                <div class="col-lg-10 mt-2 ">
                    <strong> Course Fee:</strong>
                    <div class="form-group">
                        <input class="form-control" type="number" value="{{ $course->fee }}" placeholder="Enter course fee" name="fee" required>
                    </div>
                </div>
                <div class="col-lg-10 mt-3 text-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
<style>

</style>
    
@endpush