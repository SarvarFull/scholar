<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Courses;
use App\Models\Events;
use App\Models\Indicator;
use App\Models\Persons;
use App\Models\Services;
use App\Models\Slider;
use App\Models\Teachers;
use Flasher\Laravel\Http\Request;

class IndexController extends Controller
{
    public function mainPage(Request $request)
    {
        $sliders = Slider::get();
        $services = Services::get();
        $indicators = Indicator::get();
        $category = Category::with("courses", "events")->get();
        $courses = Courses::with("category")->get();
        $teachers = Teachers::get();
        $events = Events::with("category")->get();
        $about_us = AboutUs::get();
        $contact_us = ContactUs::get();
        $users = Persons::get();
        return view("fruitables.main", compact("sliders", "services", "courses", "teachers", "events", "about_us", "contact_us", "users", "category", "indicators"));
    }
}
