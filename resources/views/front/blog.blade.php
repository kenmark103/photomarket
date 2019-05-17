@extends('layouts.app')
@section('content')
<section class="main-wrapper col-md-10 mx-auto">
 @if($blogItems)
 @foreach($blogItems as $blog)
 <div class="blog row">
    <div class="col-md-3 ml-4 image-cell"><a href="{{route('front.blog.show',$blog->id)}}"><img src="{{asset("storage/59309980_ml-720x720.jpg")}}" alt="{{$blog->slug}}" style=""></a></div>
    <div class="col-md-8 blog_description">
      <a href="{{route('front.blog.show',$blog->id)}}"><h1 class="htext">{{$blog->title}}</h1></a>
      <a href="{{route('front.blog.show',$blog->id)}}"><p>{{$blog->description}}</p></a>
    </div>
 </div>
 @endforeach
 @endif
</section>
@endsection
