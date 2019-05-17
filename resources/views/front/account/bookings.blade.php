@extends('front.account.home')
@section('main')
<div class="row my-5">
  <div class="col-md-11 justify-content-center mx-auto">
    <div class="card-header">my bookings</div>
    <div class="card-body" id="bookingstable">
      @if($bookings)
      <table class="table col-md-12">
        <tbody>
        <tr>
          <th>name</th>
          <th>date</th>
          <th>status</th>
        </tr>
        @foreach($bookings as $booking)
        <tr>
            <td>{{$booking->title}}</td>
            <td>{{$booking->date}}</td>
            <td class="text-danger">set</td>
        </tr>
        @endforeach
        </tbody>
      </table>
      @else
      <table>
        <strong>you have no set bookings!</strong>
      </table>
      @endif
      <div class="col-md-12">
        <strong>Book for a shoot by Jossy</strong>
        <form class="" action="{{route('home.booking.store')}}" method="post" class="form" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
                <label for="status">select type </label>
                <select name="type" id="type" class="form-control">
                    <option value="baby">Baby</option>
                    <option value="event">Event</option>
                    <option value="wedding">Wedding</option>
                    <option value="couples">Couples</option>
                    <option value="jungle">Jungle</option>
                </select>
            </div>
            <div class="form-group">
              <label for="date">Select date</label>
              <input type="date" name="date" value="">
            </div>
            <input type="hidden" name="user_id" value="{{Auth::guard()->user()->id}}">
            <div class="btn-group">
                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
