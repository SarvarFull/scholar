<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function coursesView()
    {
        $courses = Courses::all();

        return view("admin.courses.courses_view", compact("courses"));
    }

    public function coursesStore()
    {
        return view("admin.courses.courses_store");
    }

    public function coursesAdd(CoursesRequest $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/courses/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        Courses::create([
            'image' => $save_url_image,
            'category_id' => $request->category_id,
            'teacher' => $request->teacher,
            'course' => $request->course,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Course Added Seccessfuly !',
        );

        return redirect()->route('courses.view')->with('success', $notification);
    }

    public function coursesEdit($id)
    {
        $courses = Courses::where('id', $id)->first();

        return view('admin.courses.courses_edit', compact('courses'));
    }

    public function coursesUpdate(CoursesRequest $request, Courses $courses, $id)
    {
        $courses = Courses::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($courses->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/courses/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $courses->image;
        }

        $courses->update([
            'image' => $save_url_image,
            'category_id' => $request->category_id,
            'teacher' => $request->teacher,
            'course' => $request->course,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Course Updated Seccessfuly !',
        );

        return redirect()->route('courses.view')->with('success', $notification);
    }

    public function coursesDelete($id)
    {
        $courses = Courses::find($id);

        $courses->delete();

        $notification = array(
            'message' => 'Course Deleted Seccessfuly !',
        );

        return redirect()->route('courses.view')->with('error', $notification);
    }
}
