<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventsRequest;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function eventsView()
    {
        $events = Events::all();

        return view("admin.events.events_view", compact("events"));
    }

    public function eventsStore()
    {
        return view("admin.events.events_store");
    }

    public function eventsAdd(EventsRequest $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/events/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        Events::create([
            'image' => $save_url_image,
            'category_id' => $request->category_id,
            'course' => $request->course,
            'date' => $request->date,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Event Added Successfuly !',
        );

        return redirect()->route('events.view')->with('success', $notification);
    }

    public function eventsEdit($id)
    {
        $events = Events::where('id', $id)->first();

        return view('admin.events.events_edit', compact('events'));
    }

    public function eventsUpdate(EventsRequest $request, Events $events, $id)
    {
        $events = Events::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($events->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/events/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $events->image;
        }

        $events->update([
            'image' => $save_url_image,
            'category_id' => $request->category_id,
            'course' => $request->course,
            'date' => $request->date,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Event Updated Successfuly !',
        );

        return redirect()->route('events.view')->with('success', $notification);
    }

    public function eventsDelete($id)
    {
        $events = Events::find($id);

        $events->delete();

        $notification = array(
            'message' => 'Event Deleted Successfuly !',
        );

        return redirect()->route('events.view')->with('error', $notification);
    }
}
