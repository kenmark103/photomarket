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
    <!--include('layouts.errors-and-messages')-->
    <div class="box">
        <form action="{{ route('admin.events.store') }}" method="post" class="form">
            <div class="box-body">
              <h2>Create event</h2>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" placeholder="title" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="name">Venue <span class="text-danger">*</span></label>
                    <input type="text" name="location" id="location" placeholder="venue" class="form-control" value="{{ old('location') }}">
                </div>

                <div class="form-group">
                    <label for="name">cover <span class="text-danger">*</span></label>
                    <input type="file" name="cover" id="cover" placeholder="cover" class="form-control" value="{{ old('cover') }}">
                </div>

                <div class="form-group">
                    <label for="name">Date <span class="text-danger">*</span></label>
                    <input type="date" name="date" id="date" placeholder="date" class="form-control" value="{{ old('date') }}">
                </div>

                <div class="form-group">
                    <label for="name">time <span class="text-danger">*</span></label>
                    <input type="time" name="time" id="time" placeholder="Name" class="form-control" value="{{ old('time') }}">
                </div>

                <div class="form-group">
                    <label for="status">Status </label>
                    <select name="status" id="status" class="form-control">
                        <option value="0">Disable</option>
                        <option value="1">Enable</option>
                    </select>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <div class="btn-group">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>
@endsection
