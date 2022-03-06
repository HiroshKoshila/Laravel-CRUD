@extends('layouts\app')

@section('content')

<img src="images\salesman.png" alt="back" class="back-image">

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="have">Have a Look at</h2>
            <h2 class="topic">Laravel CRUD Web</h2>
            <h2 class="simple">Add your items</h2>
        </div>
    </div>
</div>

<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Register Now</h5>
      <h6 class="card-subtitle mb-2 text-muted">join with us</h6>
      <p class="card-text">
        Laravel is a web application framework with expressive, elegant syntax. Join with us.
      </p>
      <a href="{{ route('register') }}" class="btn">Register</a>
    </div>
  </div>

  <h2 class="simple2">CyberElysium we provide multiple services</h2>
    
  <a href="{{ route('login') }}" ><button class="btn2">Login</button>  </a>
  <h2 class="have2">to check our features</h2>

<div class="div3" id="div1">Welcome</div>
<div class="div3" id="div2">to</div>
<div class="div3" id="div3">MOst</div>
<div class="div3" id="div4">Famous</div>
<div class="div3" id="div5">Website</div>

@endsection

@push('css')
<style>

    .card{
        position: absolute;
        left: 8%;
        top: 50%;
    }

    .have{
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        padding-top: 6%;
        padding-left: 0.5%;
        font-size: 20px;
    }

    .have2{
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        top: 102.5%;
        left: 24%;
        font-size: 25px;
    }

    .topic{
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        padding-top: 8%;
        font-size: 60px;
        color: #e42911;
    }

    .simple{
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        padding-top: 13.5%;
        font-size: 40px;
    }

    .simple2{
        position: absolute;
        float: left;
        font-family: Arial, Helvetica, sans-serif;
        top: 90%;
        left: 8%;
        font-size: 40px;
    }

    .btn{
        color: white;
        background-color: #e42911;
    }
    .btn:hover{
        color: #f7270b;
        background-color: white;
        border-radius: black 5px;
        border: 1px solid black;
    }

    .btn2{
        position: relative;
        float: left;
        font-size: 24px;
        width: 190px;
        height:50px;
        border-radius: 20px;
        margin: 580px 110px;
        background: -webkit-linear-gradient(bottom, #f7270b, #f7270b);
        color:white;
    }
    .btn2:hover{
        background: white;
        border: 1px solid black;
        color:black;
    }

    .back-image{
        position: absolute;
        width: fit-content;
        height: 1100px;
        right: 0;
    }

    .div3 {
        color: white;
        width: 110px;
        height: 50px;
        background-color: #f7270b;
        font-weight: bold;
        font-size: 10px;
        position: relative;
        animation: mymove 5s infinite;
    }

#div1 {animation-timing-function: linear;}
#div2 {animation-timing-function: ease;}
#div3 {animation-timing-function: ease-in;}
#div4 {animation-timing-function: ease-out;}
#div5 {animation-timing-function: ease-in-out;}

@keyframes mymove {
  from {left: 0px;}
  to {left: 700px;}
}
</style>
@endpush


