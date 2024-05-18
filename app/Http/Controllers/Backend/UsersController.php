<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRegisterRequest;
use App\Models\Persons;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function usersView()
    {
        $users = Persons::all();

        return view("admin.users.users_view", compact("users"));
    }

    public function usersRegister(UsersRegisterRequest $request)
    {

        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/user/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        $user = Persons::where('email', $request->email)->first();
        if ($user) {
            $user->update([
                'image' => $save_url_image,
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            Session::put('user', $user);
            return redirect()->route('main.page');
        } else if (!$user) {
            $user = Persons::create([
                'image' => $save_url_image,
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            Session::put('user', $user);

            $notification = array(
                'message' => 'Your info added succsesfully !',
            );

            return redirect()->route('main.page')->with("success", $notification);

        } else {

            $notification = array(
                'message' => 'Something went wrong !',
                'alert-type' => 'error'
            );

            return redirect()->route('main.page')->with("error", $notification);
        }
    }
}
