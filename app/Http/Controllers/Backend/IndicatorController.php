<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndicatorRequest;
use App\Models\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function indicatorsView()
    {
        $indicators = Indicator::all();

        return view("admin.indicators.indicators_view", compact("indicators"));
    }

    public function indicatorsStore()
    {
        return view("admin.indicators.indicators_store");
    }

    public function indicatorsAdd(IndicatorRequest $request)
    {
        Indicator::create([
            'happy_students' => $request->happy_students,
            'course_hours' => $request->course_hours,
            'employed_students' => $request->employed_students,
            'years_experience' => $request->years_experience,
        ]);

        $notification = array(
            'message' => 'Indicator Added Successfuly !',
        );

        return redirect()->route('indicators.view')->with('success', $notification);
    }

    public function indicatorsEdit($id)
    {
        $indicators = Indicator::where("id", $id)->first();

        return view("admin.indicators.indicators_edit", compact("indicators"));
    }

    public function indicatorsUpdate(IndicatorRequest $request, $id)
    {
        $indicators = Indicator::find($id);

        $indicators->update([
            'happy_students' => $request->happy_students,
            'course_hours' => $request->course_hours,
            'employed_students' => $request->employed_students,
            'years_experience' => $request->years_experience,
        ]);

        $notification = array(
            'message' => 'Indicator Updated Successfuly !',
        );

        return redirect()->route('indicators.view')->with('success', $notification);
    }

    public function indicatorsDelete($id)
    {
        $indicators = Indicator::find($id);

        $indicators->delete();

        $notification = array(
            'message' => 'Indicator Deleted Successfuly !',
        );

        return redirect()->route('indicators.view')->with('error', $notification);
    }
}
