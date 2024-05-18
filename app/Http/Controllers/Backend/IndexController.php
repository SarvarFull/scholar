<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function adminRegister()
    {
        return view("admin.admin_register");
    }

    public function adminSignIn(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin', $admin);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.register.page');
        }
    }

    public function adminDashboard()
    {
        $admins = Admin::first();
        return view('admin.admin', compact('admins'));
    }
}
