@extends('layouts.app')
@section('content')
  <article class="article">
    <header>
      <img src="{{asset("storage/$blog->cover")}}" alt="">
      <h2>{{$blog->title}}</h2>
    </header>
    <main>
        <div class="description">
          <p>{{$blog->description}}</p>
        </div>
    </main>
    <address class="address">
        <span>Author</span> of this article <small>{{$blog->author}}</small>
    </address>
  </article>
@endsection
