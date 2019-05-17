<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Imesages;
use App\Models\UserImages;
use Illuminate\Http\UploadedFile;
use Auth;

class DashboardController extends Controller
{
    //

    public function __construct(){

    	$this->middleware('admin');
    }

    public function index(){

      $customers=User::all();
    	return view ('admin.classes.dashboard',['customers'=>$customers]);
    }

    public function store(Request $request)
    {

      $data = $request->except('_token', '_method');
      $data['admins_id']=Auth::guard('admin')->id();
      $data['slug']=str_slug($request->input('slug').'images');
      $data['users_id']=$request->selected;
      $data['message']='you have new images';

      $imesage=new Imesages($data);
      $imesage->save();
      if (($data['image']) instanceof UploadedFile && is_array($data['image']))
      {
      	  collect($data['image'])->each(function (UploadedFile $file) use ($imesage){
          $filename = $file->store('uploads', ['disk' => 'public']);
          $image = new UserImages(['src' => $filename]);
          $imesage->images()->save($image);
   
      });	
      }
       $this->toArray($imesage);
       return redirect()
       ->back()
       ->with('success','user images sent succesfully');
  } 

    public function toArray($notifiable)
    {
    return [
        'message'=>'you have new images'
    ];
    }

}
