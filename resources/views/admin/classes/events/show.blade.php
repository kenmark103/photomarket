@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Home</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <!-- Default box -->
        @if($event)
            <div class="box">
                <div class="box-body">
                  <h2>Show event</h2>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="col-md-2">Name</td>
                            <td class="col-md-3">Date</td>
                            <td class="col-md-2">Location</td>
                            <td class="col-md-3">Cover</td>
                        </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{$event->location}}</td>
                                <td>
                                    @if(isset($event->cover))
                                        <img src="{{ asset("storage/$event->cover") }}" class="img-responsive" alt="">
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @if($attends)
                    <table class="table">
                      <thead>
                        <td>
                          <strong>attendees</strong>
                        </td>
                      </thead>
                      <tbody>
                          @foreach($attends as $attendee)
                          <tr><td>{{$attendee->user->name}}</td><td>{{$attendee->user->phonenumber}}</td></tr>
                          @endforeach
                      </tbody>
                    </table>
                    @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-default btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
  </div>
@endsection
