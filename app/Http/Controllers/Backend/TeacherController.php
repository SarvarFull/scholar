<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeachersRequest;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function teachersView()
    {
        $teachers = Teachers::all();

        return view("admin.teachers.teachers_view", compact("teachers"));
    }

    public function teachersStore()
    {
        return view("admin.teachers.teachers_store");
    }

    public function teachersAdd(TeachersRequest $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/teachers/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        Teachers::create([
            'image' => $save_url_image,
            'fullname' => $request->fullname,
            'field' => $request->field,
        ]);

        $notification = array(
            'message' => 'Teacher Added Successfuly !',
        );

        return redirect()->route('teachers.view')->with('success', $notification);
    }

    public function teachersEdit($id)
    {
        $teachers = Teachers::where('id', $id)->first();

        return view('admin.teachers.teachers_edit', compact('teachers'));
    }

    public function teachersUpdate(TeachersRequest $request, Teachers $teachers, $id)
    {
        $teachers = Teachers::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($teachers->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/teachers/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $teachers->image;
        }

        $teachers->update([
            'image' => $save_url_image,
            'fullname' => $request->fullname,
            'field' => $request->field,
        ]);

        $notification = array(
            'message' => 'Teacher Updated Successfuly !',
        );

        return redirect()->route('teachers.view')->with('success', $notification);
    }

    public function teachersDelete($id)
    {
        $teachers = Teachers::find($id);

        $teachers->delete();

        $notification = array(
            'message' => 'Teacher Deleted Successfuly !',
        );

        return redirect()->route('teachers.view')->with('error', $notification);
    }
}
