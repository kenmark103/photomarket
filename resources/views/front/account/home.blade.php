@extends('layouts.app')

@section('content')
<div class="container-fluid userpage">
  <div class="row">
  <aside class="col-md-3">
    <div class="profile-wrapper">
      <button type="button" name="button" class="form-control" oninvalid=""><strong>{{ Auth::guard()->user()->name }}</strong></button>
      <span class="profile-img"><img src="{{asset('storage/users/IMG-20180828-WA0009.jpg')}}" alt=""></span>
      <button type="button" name="button" class="form-control">Edit profile</button>
    </div>
  </aside>

  <section class="col-md-9 user-dashboard container-fluid">
    <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Events</div><a href="{{route('home.events.index')}}">
          <div class="card-body">View events</div>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Images <b class="text-danger">4</b></div>
        <a href="{{route('home.images.index')}}">
          <div class="card-body">View Images</div>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Bookings</div>
        <a href="{{route('home.booking.index')}}">
          <div class="card-body">View bookings</div>
        </a>
      </div>
    </div>
   </div>

 @section('main')
   <div class="row my-5">
     <div class="col-md-10 justify-content-center mx-auto">
       <div class="card-header">dashboard</div>
       <div class="card-body">
         welcome
       </div>
     </div>
   </div>
   @show
  </section>
</div>
</div>
@endsection
