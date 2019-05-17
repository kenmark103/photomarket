@extends('layouts.app')
@section('content')
<main>
  <div class="main-wrapper">
    @if($products)
    <div class="row row-item">
      @foreach($products as $product)
        <div class="col-md-3 col-md-4  col-md-5 row-cell"> <a href="{{route('front.wedding.show',$product->id)}}"><img src="{{asset("storage/$product->cover")}}" alt="{{$product->slug}}"></a></div>
      @endforeach
    </div>
    @endif
  </div>
</main>
@endsection
