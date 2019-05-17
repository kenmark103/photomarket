@extends('layouts.app')
@section('content')
<section class="main-wrapper row">
<div class="col-md-3 ml-4"><img src="{{asset("storage/59309980_ml-720x720.jpg")}}" alt="jossy_pic" style="width:100%;height:auto;border-radius:3px;background-color:#030303;"></div>
 <div class="col-md-6">
   <h1 class="htext">My <br> Journey <br> So Far</h1>
   <p> I am Jossy Ofcourse, African Based Visual Artist currently self-employed. I specialise in brand-identity and Visual Communication.
       I am concerned with the fields of weddings, event shootings, outdoor shoots, babyshoots and any other shoots you might be interested
       in. I hope you enjoy my site and feel free to book for a similar shoot.
   </p>
   <div class="col-md-4 ml-auto"><img src="{{asset("storage/events/IMG-20180706-WA0001.jpg")}}" alt="jossy_pic" style="width:100%;height:auto;border-radius:50%;"></div>
   <br><br><br><br>
   <p class="text-center" id="support">For support or inquiries please feel free to contact the following<br> Admin <strong> 0700207666 <br> 0713425499 <br> 0700207435 </strong></p>
   <div class="contactwrapper mx-auto col-md-6 col-xs-12">
       <div class="mail_class">
         <form class="form-group" action="mailto:kenmark103@gmail.com" method="post">
           @csrf
           <input type="text" name="" value="" class="form-control my-1" placeholder="name">
           <input type="email" name="" value="" class="form-control my-1" placeholder="email">
           <textarea name="name" rows="8" cols="80" class="form-control my-1" placeholder="message"></textarea>
           <button type="submit" name="button" class="btn-primary form-control">Send email</button>
         </form>
         <span class="glyphicon glyphicon-envelope"></span>
       </div>
   </div>
 </div>
</section>
@endsection
