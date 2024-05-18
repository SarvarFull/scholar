<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact_usView()
    {
        $contact_us = ContactUs::all();

        return view("admin.contact_us.contact_us_view", compact("contact_us"));
    }

    public function contact_usStore()
    {
        return view("admin.contact_us.contact_us_store");
    }

    public function contact_usAdd(ContactUsRequest $request)
    {
        ContactUs::create([
            'title' => $request->title,
            'content' => $request->content,
            'discount' => $request->discount,
            'd_contact' => $request->d_contact,
        ]);

        $notification = array(
            'message' => 'Contact Us Added Successfuly !',
        );

        return redirect()->route('contact_us.view')->with('success', $notification);
    }

    public function contact_usEdit($id)
    {
        $contact_us = ContactUs::where('id', $id)->first();

        return view("admin.contact_us.contact_us_edit", compact("contact_us"));
    }

    public function contact_usUpdate(ContactUsRequest $request, ContactUs $contact_us, $id)
    {
        $contact_us = ContactUs::find($id);

        $contact_us->update([
            'title' => $request->title,
            'content' => $request->content,
            'discount' => $request->discount,
            'd_contact' => $request->d_contact,
        ]);

        $notification = array(
            'message' => 'Contact Us Updated Successfuly !',
        );

        return redirect()->route('contact_us.view')->with('success', $notification);
    }

    public function contact_usDelete($id)
    {
        $contact_us = ContactUs::find($id);

        $contact_us->delete();

        $notification = array(
            'message' => 'Contact Us Deleted Successfuly !',
        );

        return redirect()->route('contact_us.view')->with('error', $notification);
    }
}
