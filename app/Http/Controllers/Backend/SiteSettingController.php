<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingsRequest;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteSettingController extends Controller
{
    public function siteSettingsView()
    {
        $site_settings = SiteSettings::all();

        return view("admin.site_settings.site_settings_view", compact("site_settings"));
    }

    public function siteSettingsStore()
    {
        return view("admin.site_settings.site_settings_store");
    }

    public function siteSettingsAdd(SiteSettingsRequest $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/events/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        SiteSettings::create([
            'image' => $save_url_image,
            'category_id' => $request->category_id,
            'course' => $request->course,
            'date' => $request->date,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Site info Added Successfuly !',
        );

        return redirect()->route('site.settings.view')->with('success', $notification);
    }

    public function siteSettingsEdit($id)
    {
        $site_settings = SiteSettings::where('id', $id)->first();

        return view('admin.site_settings.site_settings_edit', compact('site_settings'));
    }

    public function siteSettingsUpdate(SiteSettingsRequest $request, SiteSettings $site_settings, $id)
    {
        $site_settings = SiteSettings::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($site_settings->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/events/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $site_settings->image;
        }

        $site_settings->update([
            'image' => $save_url_image,
            'category_id' => $request->category_id,
            'course' => $request->course,
            'date' => $request->date,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Site info Updated Successfuly !',
        );

        return redirect()->route('site.settings.view')->with('success', $notification);
    }

    public function siteSettingsDelete($id)
    {
        $site_settings = SiteSettings::find($id);

        $site_settings->delete();

        $notification = array(
            'message' => 'Site info Deleted Successfuly !',
        );

        return redirect()->route('site.settings.view')->with('error', $notification);
    }
}
