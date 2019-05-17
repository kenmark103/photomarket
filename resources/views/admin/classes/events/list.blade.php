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
        @if($events)
            <div class="box">
                <div class="box-body">
                    <h2>Events</h2>
                    <!-- include search-->
                        @if(isset($events))
                          <table class="table">
                              <tbody>
                              <tr>
                                  <td class="col-md-2">Name</td>
                                  <td class="col-md-2 text-center">Cover</td>
                                  <td class="col-md-2 text-center">Venue</td>
                                  <td class="col-md-2">Date</td>
                                  <td class="col-md-2">Time</td>
                                  <td class="col-md-2">Actions</td>
                              </tr>
                              </tbody>
                              <tbody>
                              @foreach ($events as $event)
                                  <tr>
                                      <td><a href="{{ route('admin.events.show', $event->id) }}">{{ $event->title }}</a></td>
                                      <td class="text-center">
                                          @if(isset($event->cover))
                                              <img src="{{ asset('storage/$event->cover') }}" alt="" class="img-responsive" style="width: 100%;">
                                          @else
                                              -
                                          @endif
                                      </td>
                                      <td class="text-center">{{ $event->location}}</td>
                                      <td class="text-center">{{ $event->date }}</td>
                                      <td class="text-center">{{ $event->time }}</td>
                                      <td>
                                          <form action="{{ route('admin.events.destroy', $event->id) }}" method="post" class="form-horizontal">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="_method" value="delete">
                                              <div class="btn-group">
                                                  <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                  <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                              </div>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      @endif
                    <a href="{{route('admin.events.create')}}"><button type="btn" name="links" class="btn btn-default"> new event</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
</div>
@endsection
