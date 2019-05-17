@extends('layouts.app')
@section('content')
<main>
  @if(isset($gallery))
  <div class="cover-wrapper">
    <h4>{{$gallery->name}}</h4>
    <div class="justify-content-center">
      <img src="{{asset("/storage/$gallery->cover")}}" alt="">
    </div>
  </div>
  <div class="images-wrapper">
    @foreach($gallery->images as $images)
    <img src="{{asset("/storage/$images->src")}}" alt="">
    @endforeach
  </div>
  @endif
</main>
@endsection
