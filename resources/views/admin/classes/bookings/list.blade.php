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
            <div class="box">
                <div class="box-body">
                    <h2>Bookings</h2>
                    include('layouts.search', ['route' => route('admin.bookings.index')])
                    @if(isset($bookings))
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="col-md-3">Date</td>
                                <td class="col-md-2">Type</td>
                                <td class="col-md-3">Customer</td>
                                <td class="col-md-2">Phonenumber</td>
                                <td class="col-md-2">Status</td>
                            </tr>
                        </tbody>
                        <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td><a title="Show order" href="{{ route('admin.bookings.show', $booking->id) }}">{{ date('M d, Y h:i a', strtotime($booking->date)) }}</a></td>
                                <td>{{$booking->title }}</td>
                                <td>{{$booking->customer->name}}</td>
                                <td>{{$booking->customer->phonenumber}}  </td>
                                <td><p class="text-center" style="color: #ffffff; background-color: #f6993f;">awaiting</p></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <table>
                      <tbody>
                        <strong>no booking available!</strong>
                      </tbody>
                    </table>
                  @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    bookings->links
                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
