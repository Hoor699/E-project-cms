<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;

class TrackingController extends Controller
{
    // Yeh function tracking search wala page dikhayega
    public function index()
    {
        $courier = null;
        return view('user.track_details'); // Agar aapne isi page par search box rakha hai
    }

    // Yeh function ID check karke redirect karega
    public function viewStatus(Request $request)
    {
        $tracking_no = $request->tracking_no;
        $exists = Courier::where('tracking_no', $tracking_no)->exists();

        if ($exists) {
            return redirect()->route('user.track.details', ['tracking_no' => $tracking_no]);
        } else {
            return back()->with('error', 'Tracking ID galat hai!');
        }
    }

    // YEH SABSE ZAROORI HAI: Details dikhane ke liye
    public function viewStatusByNumber($tracking_no)
    {
        $courier = Courier::where('tracking_no', $tracking_no)->first();

        if (!$courier) {
            return redirect()->route('user.track')->with('error', 'Data nahi mila');
        }

        return view('user.track_details', compact('courier'));
    }
}