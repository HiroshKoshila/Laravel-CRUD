@extends('layouts\app')

@section('content')
<div style="background-color: rgb(190, 188, 188); padding-bottom:200px;">
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Dashboard</h1>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    @forelse ($banners as $banner)

    <div class="card" style="width: 18rem; margin-left:60px; margin-top:30px; padding-bottom:10px;">
        <img src="{{ config('images.access_path') }}/{{ $banner->images->name }}" alt="banner" class="image-dash">

        <div class="card-body">
          <h5 class="card-title">{{ $banner->title }}</h5>
          <h6 class="list-group-item">LKR {{ $banner->price }}</h6>
          
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item pb-10"> <p class="card-text">{{ $banner->description }}</p></li>
        </ul>
      </div>

    @empty
        <h1>nothing</h1>
    @endforelse
    
</div>    
</div>

@endsection

@push('css')
<style>
    .page-title{
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: white;
        font-family: sans-serif; 
        margin-top: 25px;
        margin-bottom: 10px;
        color:#e42911;
    }

    .image-dash{
        height: 160px;
        width: 178px;
    }
</style>
    
@endpush
