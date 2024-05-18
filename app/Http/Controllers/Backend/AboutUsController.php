<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutUsController extends Controller
{
    public function about_usView()
    {
        $about_us = AboutUs::all();

        return view("admin.about_us.about_us_view", compact("about_us"));
    }

    public function about_usStore()
    {
        return view("admin.about_us.about_us_store");
    }

    public function about_usAdd(AboutUsRequest $request)
    {
        AboutUs::create([
            'q_title' => $request->q_title,
            'q_content' => $request->q_content,
        ]);

        $notification = array(
            'message' => 'About Us Added Successfuly !',
        );

        return redirect()->route('about_us.view')->with('success', $notification);
    }

    public function about_usEdit($id)
    {
        $about_us = AboutUs::where('id', $id)->first();

        return view('admin.about_us.about_us_edit', compact('about_us'));
    }

    public function about_usUpdate(AboutUsRequest $request, AboutUs $about_us, $id)
    {
        $about_us = AboutUs::find($id);

        $about_us->update([
            'q_title' => $request->q_title,
            'q_content' => $request->q_content,
        ]);

        $notification = array(
            'message' => 'About Us Updated Successfuly !',
        );

        return redirect()->route('about_us.view')->with('success', $notification);
    }

    public function about_usDelete($id)
    {
        $about_us = AboutUs::find($id);

        $about_us->delete();

        $notification = array(
            'message' => 'About Us Deleted Successfuly !',
        );

        return redirect()->route('about_us.view')->with('error', $notification);
    }
}
