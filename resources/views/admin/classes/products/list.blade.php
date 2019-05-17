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
    <!-- Default box -->
        @if($products)
            <div class="box">
                <div class="box-body">
                    <h2>Galore</h2>
                    <!-- include search-->
                        @if(isset($products))
                          <table class="table">
                              <tbody>
                              <tr>
                                  <td class="col-md-2">Name</td>
                                  <td class="col-md-2 text-center">Cover</td>
                                  <td class="col-md-2 text-center">Description</td>
                                  <td class="col-md-2">Category</td>
                                  <td class="col-md-2">Actions</td>
                              </tr>
                              </tbody>
                              <tbody>
                              @foreach ($products as $product)
                                  <tr>
                                      <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a></td>
                                      <td class="text-center">
                                          @if(isset($product->cover))
                                              <img src="{{ asset("storage/$product->cover") }}" alt="" class="img-responsive" style="width:auto; height: 40px;">
                                          @else
                                              -
                                          @endif
                                      </td>
                                      <td class="text-center">{{ $product->description }}</td>
                                      <td>{{$product->category->name}}</td>
                                      <td>
                                          <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="form-horizontal">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="_method" value="delete">
                                              <div class="btn-group">
                                                  <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                  <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                              </div>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      @endif
                      <a href="{{route('admin.products.create')}}"><button type="btn" name="links" class="btn btn-default"> new product</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
</div>
@endsection
