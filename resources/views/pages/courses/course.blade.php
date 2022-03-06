@extends('layouts\app')

@section('content')
<div style="padding-bottom:200px;">
    <div class="col-lg-12 text-center mt-2">
        <h1 class="page-title">Student List with Courses</h1>
    </div>
    <div class="container col-lg-12">
    
    <div class="col-lg-12 mt-5">
        <div>
            <a href="{{ route('course.create') }}" class="btn btn-success">Add New Student for course</a>                            
            <table class="table table-dark table-striped mt-5">
                <thead>
                  <tr>
                    <th scope="col">list</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Course Fee</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($course as $key => $course)
                    
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->course }}</td>
                        <td>{{ $course->fee }}</td>
                        <td>
                            <a href="{{ route('course.delete',$course->id) }}" class="btn btn-danger">delete</a>
                            <a href="{{ route('course.edit',$course->id) }}" class="btn btn-success">edit</a>                            
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
</div>

@endsection

@push('css')
<style>
.page-title{
    color: #e42911;
}
</style>
    
@endpush
