@extends('layouts\app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mt-2">
            <h1 class="page-title">Add New Item</h1>
        </div>
        <div class="container2 col-lg-10 mt-3">
            <form role="form" action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                 <div class="row">
                    <div class="col-lg-10 mt-2">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter item name" name="title" required>
                        </div>
                    </div>
                    <div class="col-lg-10 mt-2">
                        <div class="form-group">
                            <input class="form-control" type="number" min="50" placeholder="Enter price (LKR)" name="price" required>
                        </div>
                    </div>
                    <div class="col-lg-10 mt-2">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter description" name="description" required>
                        </div>
                    </div>
                    <div class="col-lg-10 mt-2">
                        <div class="form-group">
                            <input class="form-control" type="file" name="images"
                            accept="image/jpg, image/jpeg, image/png">
                        </div>
                    </div>
                    <div class="col-lg-10 mt-3 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="btn1">Add Item</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <h1 class="page-title">Item List</h1>
        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">list</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $key => $banner)
                        
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $banner->name }}</td>
                            <td>{{ $banner->price }}</td>
                            <td>{{ $banner->description }}</td>
                            <td>
                                <img src="{{ config('images.access_path') }}/thumb/105x140/{{ $banner->images->name }}" alt="" width="100px">
                            </td>
                            <td>
                                @if ($banner->status == 0)
                                    <span class="badge bg-warning" id="pub">Not Published</span>
                                @else
                                    <span class="badge bg-success">Published</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('banner.delete',$banner->id) }}" class="btn btn-danger">delete</a>

                                @if ($banner->status == 0)
                                <a href="{{ route('banner.status',$banner->id) }}" class="btn btn-success">Publish</a>
                                @else
                                <a href="{{ route('banner.status',$banner->id) }}" class="btn btn-warning">Don't Publish</a>
                                @endif
                                
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
        padding-top: 10px;
        color: #e42911;
    }

    .container2{
        margin-left: 200px;
    }

    #btn1{
        color: white;
        background-color: #e42911;
    }
    #btn1:hover{
        color: #e42911;
        background-color: white;
    }

    #pub{
        color: black;
    }
    </style>
@endpush