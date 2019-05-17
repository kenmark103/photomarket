<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\event_bookings;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events= Events::all();
        return view('admin.classes.events.list', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.classes.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->except('_method','_token');
        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $request->file('cover')->store('events', ['disk' => 'public']);
        }
      //  $data['cover'] = Storage::putFile('events', $request->file('cover'));
      $this->createProduct($data);

      return redirect()->route('admin.events.index');

    }
    public function createProduct(array $params) : Events
    {
      try {
          $event = new Events($params);
          $event->save();

          return $event;
        } catch (QueryException $e) {
            throw new ProductInvalidArgumentException($e->getMessage());
        }
      }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $attending=event_bookings::all()->where('events_id',$id);
        $event=Events::find($id);
        return view('admin.classes.events.show',[
          'event'=>$event,
          'attends'=>$attending,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $event=Events::find($id);
        return view('admin.classes.events.edit',[
          'event'=>$event,
          //'images' => $product->images()->get(['src']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event=Events::find($id);
        $event->delete();
        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.events.index');
    }
}
