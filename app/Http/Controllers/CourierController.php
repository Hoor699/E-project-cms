<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;
use Illuminate\Support\Str;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Agent;


class CourierController extends Controller
{
    

public function create()
{
    // Database se sare agents uthayein
    $agents = Agent::all(); 
    
    // View ko agents ka data pass karein
    return view('Admin.couriers.create', compact('agents'));
}

public function store(Request $request) 
{
    $request->validate([
        'agent_id'      => 'required',
        'sender_name'   => 'required',
        'sender_email'  => 'required|email', 
        'sender_phone'  => 'required',
        'receiver_name' => 'required',
        'from_city'     => 'required',
        'to_city'       => 'required',
        'weight'        => 'required|numeric', // Naya field validation
        'price'         => 'required|numeric',
    ]);

    // Courier table mein data save karna
    Courier::create([
        'tracking_no'   => 'SF-' . rand(100000, 999999), 
        'agent_id'      => $request->agent_id,
        'sender_name'   => $request->sender_name,
        'sender_email'  => $request->sender_email, // Yeh line missing thi!
        'sender_phone'  => $request->sender_phone, // Yeh line missing thi!
        'receiver_name' => $request->receiver_name,
        'from_city'     => $request->from_city,
        'to_city'       => $request->to_city,
        'weight'        => $request->weight,      // Naya field save karna
        'price'         => $request->price,
        'status'        => 'Pending',
    ]);

    // Customer table mein record maintain karna
    Customer::firstOrCreate(
        ['email' => $request->sender_email], 
        [
            'name' => $request->sender_name,
            'phone' => $request->sender_phone,
            'address' => $request->from_city 
        ]
    );

    return redirect()->route('courier.index')->with('success', 'Courier successfully booked!');
}
// CourierController.php
public function dashboard()
{
    // Use full path to be 100% sure
    $totalUsers = \App\Models\User::all()->count(); 
    
    // Baki data
    $totalCouriers = \App\Models\Courier::count();
    $pendingCouriers = \App\Models\Courier::where('status', 'Pending')->count();
    $deliveredCouriers = \App\Models\Courier::where('status', 'Delivered')->count();
    $totalAgents = \App\Models\Agent::count();

    return view('admin.dashboard', compact(
        'totalUsers', 
        'totalCouriers', 
        'pendingCouriers', 
        'deliveredCouriers', 
        'totalAgents'
    ));
}
    public function index()
{
    // Database se saara data uthayega
    $couriers = Courier::all(); 
    return view('admin.couriers.index', compact('couriers'));
}
// --- EDIT SECTION ---
    public function edit($id)
    {
        $courier = Courier::findOrFail($id); // Data dhoondega, na milne par 404 dega
        return view('admin.couriers.edit', compact('courier'));
    }

    // --- UPDATE SECTION ---
    public function update(Request $request, $id)
    {
        $request->validate([
            'sender_name' => 'required',
            'receiver_name' => 'required',
            'from_city' => 'required',
            'to_city' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        $courier = Courier::findOrFail($id);
        $courier->update($request->all());

        return redirect()->route('courier.index')->with('success', 'Courier updated successfully!');
    }

    // --- DELETE SECTION ---
    public function destroy($id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();
        return redirect()->back()->with('success', 'Courier deleted successfully!');
    }


   public function downloadReport()
{
    $couriers = Courier::all();
    $csvFileName = 'shipment_report_' . date('Y-m-d') . '.csv';
    $headers = [
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$csvFileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];

    $columns = ['Tracking No', 'Sender', 'Receiver', 'From', 'To', 'Price', 'Status'];

    $callback = function() use($couriers, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($couriers as $item) {
            fputcsv($file, [$item->tracking_no, $item->sender_name, $item->receiver_name, $item->from_city, $item->to_city, $item->price, $item->status]);
        }
        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}

public function sendSMS($id)
{
    // 1. Data check karen
    $courier = Courier::find($id);

    if (!$courier) {
        return redirect()->back()->with('error', 'Record nahi mila!');
    }

    // 2. Message tayyar karen
    $msg = "Dear " . $courier->sender_name . ", your courier from " . $courier->from_city . " is booked.";

    // 3. Log mein check karen (Apne project ke storage/logs/laravel.log mein dekhen)
    \Log::info("Button Clicked for SMS: " . $msg);

    // 4. Sabse zaroori: Wapis list par bheinjen success message ke sath
    return redirect()->route('courier.index')->with('success', 'SMS status sent for tracking ID: ' . $courier->tracking_no);
}

public function webStore(Request $request)
{
    // 1. Validation (Form ke 'name' attributes ke mutabiq)
    $request->validate([
        'sender_name' => 'required',
        'sender_email' => 'required|email',
        'from_city' => 'required',
        'to_city' => 'required',
        'receiver_name' => 'required',
        'weight' => 'required',
    ]);

    // 2. Data Saving Logic
    $courier = new Courier();
    $courier->tracking_no = 'CMS-' . rand(100000, 999999); // Column name check karlein (tracking_id ya tracking_no)
    $courier->sender_name = $request->sender_name;
    $courier->sender_email = $request->sender_email;
    $courier->sender_phone = $request->sender_phone;
    $courier->receiver_name = $request->receiver_name;
    $courier->from_city = $request->from_city;
    $courier->to_city = $request->to_city;
    $courier->weight = $request->weight;
    $courier->status = 'Pending'; 
    $courier->price = 0;
    
    // Agent ID null hogi kyunke ye website se aaya hai
    $courier->agent_id = null; 

    $courier->save();

    return back()->with('success', 'Booking Successful! Tracking ID: ' . $courier->tracking_id);
}
}
