@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">galleries</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <!-- Default box -->
        @if($product)
            <div class="box">
                <div class="box-body">
                  <h2>Show galore item</h2>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="col-md-2">Name</td>
                            <td class="col-md-3">Description</td>
                            <td class="col-md-3">Cover</td>
                        </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    @if(isset($product->cover))
                                        <img src="{{ asset("storage/$product->cover") }}" class="img-responsive" alt="">
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                      <tbody>
                        @if(isset($products))
                        <tr>
                          @foreach($products as $product)
                          <td>{{$product->id}}</td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->status}}</td>
                          <td><img src="{{asset("storage/cover")}}" alt=""> </td>
                          @endforeach
                        </tr>
                        @endif
                      </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-default btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
  </div>
@endsection
