@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">categories</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <form action="{{ route('admin.catgories.update', $category->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="col-md-8">
                            <h2>{{ ucfirst($category->name) }}</h2>
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $category->name ?: old('name')  !!}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description </label>
                                <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{!! $category->description ?: old('description')  !!}</textarea>
                            </div>
                            <div class="form-group">
                                @if(isset($category->cover))
                                    <div class="col-md-3">
                                        <div class="row">
                                            <img src="{{ asset("storage/$category->cover") }}" alt="" class="img-responsive"> <br />
                                            <a onclick="return confirm('Are you sure?')" href="{{ route('admin.categories.index', ['category' => $category->id, 'image' => substr($category->cover, 9)]) }}" class="btn btn-danger btn-sm btn-block">Remove image?</a><br />
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row"></div>
                            <div class="form-group">
                                <label for="cover">Cover </label>
                                <input type="file" name="cover" id="cover" class="form-control">
                            </div>

                            <div class="row"></div>

                            <div class="form-group">
                                <label for="status">Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" @if($category->status == 0) selected="selected" @endif>Disable</option>
                                    <option value="1" @if($category->status == 1) selected="selected" @endif>Enable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2>Categories</h2>
                            include('admin.shared.categories', ['categories' => Scategories, 'ids' => SproductCategoryIds])
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>
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
