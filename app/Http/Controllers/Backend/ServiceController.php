<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function servicesView()
    {
        $services = Services::all();

        return view("admin.services.services_view", compact("services"));
    }

    public function servicesStore()
    {
        return view("admin.services.services_store");
    }

    public function servicesAdd(ServicesRequest $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/services/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        Services::create([
            'image' => $save_url_image,
            'title' => $request->title,
            'about' => $request->about,
            'in_detail' => $request->in_detail,
        ]);

        $notification = array(
            'message' => 'Service Added Seccessfuly !',
        );

        return redirect()->route('services.view')->with('success', $notification);
    }

    public function servicesEdit($id)
    {
        $services = Services::where('id', $id)->first();

        return view('admin.services.services_edit', compact('services'));
    }

    public function servicesUpdate(ServicesRequest $request, Services $services, $id)
    {
        $services = Services::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($services->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/services/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $services->image;
        }

        $services->update([
            'image' => $save_url_image,
            'title' => $request->title,
            'about' => $request->about,
            'in_detail' => $request->in_detail,
        ]);

        $notification = array(
            'message' => 'Service Updated Seccessfuly !',
        );

        return redirect()->route('services.view')->with('success', $notification);
    }

    public function servicesDelete($id)
    {
        $services = Services::find($id);

        $services->delete();

        $notification = array(
            'message' => 'Service Deleted Seccessfuly !',
        );

        return redirect()->route('services.view')->with('error', $notification);
    }
}
