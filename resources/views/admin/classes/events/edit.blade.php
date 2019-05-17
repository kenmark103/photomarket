@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Products</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <form action="{{ route('admin.events.update', $event->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="col-md-8">
                            <h2>{{ ucfirst($event->title) }}</h2>

                            <div class="form-group">
                                <label for="name">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" placeholder="title" class="form-control" value="{!! $event->title ?: old('name')  !!}">
                            </div>

                            <div class="form-group">
                                @if(isset($event->cover))
                                    <div class="col-md-3">
                                        <div class="row">
                                            <img src="{{ asset("storage/$event->cover") }}" alt="" class="img-responsive"> <br />
                                            <a onclick="return confirm('Are you sure?')" href="{{ route('admin.events.index', ['event' => $event->id, 'image' => substr($event->cover, 9)]) }}" class="btn btn-danger btn-sm btn-block">Remove image?</a><br />
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="row"></div>
                            <div class="form-group">
                                <label for="name">Venue <span class="text-danger">*</span></label>
                                <input type="text" name="location" id="location" placeholder="location" class="form-control" value="{!! $event->location ?: old('location')  !!}">
                            </div>
                            <div class="form-group">
                                <label for="name">Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" id="date" placeholder="date" class="form-control" value="{!! $event->date ?: old('date')  !!}">
                            </div>
                            <div class="form-group">
                                <label for="name">Time <span class="text-danger">*</span></label>
                                <input type="time" name="time" id="name" placeholder="time" class="form-control" value="{!! $event->time ?: old('time')  !!}">
                            </div>
                            <div class="row"></div>
                            <div class="form-group">
                                <label for="cover">Cover </label>
                                <input type="file" name="cover" id="cover" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="status">Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" @if($event->status == 0) selected="selected" @endif>Disable</option>
                                    <option value="1" @if($event->status == 1) selected="selected" @endif>Enable</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
