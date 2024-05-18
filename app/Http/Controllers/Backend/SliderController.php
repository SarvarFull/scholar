<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlidersRequest;
// use App\Http\Requests\SlidersRequest;cls

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function sliderView()
    {
        $sliders = Slider::all();

        return view("admin.slider.slider_view", compact("sliders"));
    }

    public function sliderStore()
    {
        return view("admin.slider.slider_store");
    }

    public function sliderAdd(SlidersRequest $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/slider/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        Slider::create([
            'image' => $save_url_image,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'Slider Added Seccessfuly !',
        );

        return redirect()->route('slider.view')->with('success', $notification);
    }

    public function sliderEdit($id)
    {
        $sliders = Slider::where('id', $id)->first();

        return view('admin.slider.slider_edit', compact('sliders'));
    }

    public function sliderUpdate(SlidersRequest $request, Slider $slider, $id)
    {
        $slider = Slider::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($slider->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/slider/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $slider->image;
        }

        $slider->update([
            'image' => $save_url_image,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'Slider Updated Seccessfuly !',
        );

        return redirect()->route('slider.view')->with('success', $notification);
    }

    public function sliderDelete($id)
    {
        $slider = Slider::find($id);

        $slider->delete();

        $notification = array(
            'message' => 'Slider Deleted Seccessfuly !',
        );

        return redirect()->route('slider.view')->with('error', $notification);
    }
}
