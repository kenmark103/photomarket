@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Widgets
      <small>Preview page</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Widgets</li>
    </ol>
  </section>
  <!-- Main content -->
<section class="content">
  <div class="row">
    <form class="form" action="{{route('admin.dashboard.upload')}}" method="post">
      @csrf
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">

            <li>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i>{{now()}}</span>

                <h3 class="timeline-header"><a href="#">Upload</a> new photos</h3>

                <div class="timeline-body">
                 <img src="{{asset('storage/15.jpg')}}" alt="..." class="margin" style="width: 100px; height: auto;">
                  <div class="form-group">
                      <label for="image">Images</label>
                      <input type="file" name="image[]" id="image" class="form-control" multiple>
                      <span class="text-warning">You can use ctrl (cmd) to select multiple images</span>
                  </div>
                </div>

                <div class="contacts-control">
                  <div class="col-md-4 btn-group justify-content-center">
                      <a href="" class="btn btn-default">cancel</a>
                      <button type="submit" name="upload" class="btn btn-primary">upload</button>
                  </div>
                  <div class="timeline_search col-md-8 form-group">
                    <div class="input-group">
                      <input type="text" name="" value="" class="form-control" placeholder="contacts">
                      <span class="input-group-addon">Search</span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-8">
                    @if(isset($customers))
                      <ul class="contact_list">
                        <b>
                          @foreach($customers as $customer)
                            <li><input type="radio"  name="selected" onchange="changeName()" value="{{$customer->id}}" class="contact">&nbsp;&nbsp;{{$customer->name}}</input></li>
                         @endforeach
                        </b>
                      </ul>
                    @else
                    <b>no customers!!</b>
                    @endif
                  </div>
                </div>
               <br><br><br>
              </div>
            </li>
          </ul>
        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="timeline">
          <li>
            <div class="timeline-item">
              <h3 class="timeline-header">New Blog</h3>
              <div class="timeline-body">
                <form action="{{route('admin.blogs.store')}}" class="form" method="post">@csrf
                  <div class="form-group">
                    <label for="title">Blog Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Blog Title">
                  </div>
                  <div class="form-group">
                    <input type="file" class="form-control" name="cover">Select cover image</input>
                  </div>
                    <div>
                      <textarea name="description" class="textarea" placeholder="Write your article"
                                style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="file" name="images[]" class="form-control" multiple>Select accompanying image(s)</input>
                    </div>
                    <div class="box-footer clearfix">
                      <button type="submit" class="pull-right btn btn-default" id="sendBlog">Submit
                        <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
    $(document).ready(function changeName(){
    $("input[type='radio'][name='']:checked").val();
 });
</script>
@endsection
