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
       <!--include layouts.errors-and-messages-->
        <div class="box">
            <form action="{{route('admin.products.store')}}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                  <h2>Create galore item</h2>
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="category">Category <span class="text-danger">*</span></label>
                        <select name="categories_id" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name / Title<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover </label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Images</label>
                        <input type="file" name="image[]" id="image" class="form-control" multiple>
                        <span class="text-warning">You can use ctr (cmd) to select multiple images</span>
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
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
