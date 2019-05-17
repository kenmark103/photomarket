@extends('front.account.home')
@section('main')
<div class="row my-5">
  <div class="col-md-10 justify-content-center mx-auto">
    <div class="card-header" id='eventstable'>events</div>
    <div class="card-body">
      @if($events)
        @foreach($events as $event)
        <form class="form" action="{{route('home.events.store')}}" method="post">
          @csrf
            <div class="row">
              <ul class="col-md-4">
                <li><b>{{$event->title}}</b></li>
                <li>{{$event->location}}</li>
                <li>{{$event->date}}</li>
                <li>{{$event->time}}</li>
              </ul>
              <div class="col-md-3">
                @if(isset($event->cover))
                  <img src="{{asset("storage/$event")}}" alt="">
                @endif
              </div>
              <div class="form-group col-md-3">
                <input type="hidden" name="eventid" value="{{$event->id}}">
                <input type="hidden" name="event" value="{{$event->title}}">
                <button type="submit" name="attendbtn" class="btn btn-default">Attend</button>
              </div>
             </div>
           </form>
          @endforeach
        @else
       <strong>no events currently available</strong>

     @endif
    </div>
  </div>
</div>
@endsection
