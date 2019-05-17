@extends('front.account.home')
@section('main')
<div class="row my-5">
  <div class="col-md-12 justify-content-center mx-auto">
    <div class="card-header">images</div>
    @if($images)
    <div class="card-body">
      <ul class='imagelist'>
        @foreach($images as $image)
        <li class="col-md-4"><div class="image-box"><img src="{{asset('storage/uimages/$image->slug')}}" alt="{{$image->user->name}}image"></div></li>
        @endforeach
      </ul>
    </div>
    @else
    <div class="card-body">
    <strong>no images yet!</strong>
    </div>
    @endif
  </div>
</div>
@endsection
