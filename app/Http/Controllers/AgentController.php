<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Courier;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    // 1. Agent banane ka Form dikhane ke liye
    public function create()
    {
        return view('admin.agents.create'); 
    }

    // 2. Form ka data Database mein save karne ke liye
public function store(Request $request)
{
    // 1. Sab se pehle VALIDATION (Yeh lazmi hai)
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email', // Check ke email users table mein pehle se na ho
        'password' => 'required|min:6',
        'role'     => 'required',
        'phone'    => 'required',
        'city'     => 'required',
    ]);

    // 2. User Table mein entry (Login account banane ke liye)
    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password), // Password ko encrypt karna
        'role'     => $request->role, 
    ]);

    // 3. Agent Table mein entry (Extra details ke liye)
    Agent::create([
        'user_id' => $user->id, // Dono tables ka talluq (Relationship) ban gaya
        'name'    => $request->name,
        'email'   => $request->email,
        'phone'   => $request->phone,
        'city'    => $request->city,
    ]);

    // 4. Redirect with Success Message
    return redirect()->route('agent.index')->with('success', 'Agent and Login Account Created Successfully!');
}
    public function index()
{
    $agents = Agent::all(); // Saare agents ka data le kar aao
    return view('admin.agents.index', compact('agents'));
}
// 1. Edit Form dikhane ke liye
public function edit($id)
{
    $agent = Agent::findOrFail($id);
    return view('admin.agents.edit', compact('agent'));
}

// 2. Data update karne ke liye
public function update(Request $request, $id)
{
    $agent = Agent::findOrFail($id);
    $agent->update($request->all());
    return redirect()->route('agent.index')->with('success', 'Agent Updated Successfully!');
}

// 3. Agent ko delete karne ke liye
public function destroy($id)
{
    $agent = Agent::findOrFail($id);
    $agent->delete();
    return redirect()->back()->with('success', 'Agent Deleted Successfully!');
}

//agents
// 1. New Courier Form (Agent ke liye)
public function createCourier() {
    return view('admin.courier.create');
}

// 2. Save New Courier
public function storeCourier(Request $request) {
    $request->validate([
        'sender_name' => 'required',
        'receiver_name' => 'required',
        'phone' => 'required',
    ]);

    Courier::create([
        'tracking_id' => 'TRK-' . strtoupper(uniqid()), // Auto generate tracking ID
        'sender_name' => $request->sender_name,
        'receiver_name' => $request->receiver_name,
        'phone' => $request->phone,
        'status' => 'Pending',
        'agent_id' => auth()->id(), // Jo agent login hai uski ID
    ]);

    return redirect()->back()->with('success', 'Courier added and Tracking ID generated!');
}

// 3. View All Couriers (Agent ke apne branch ke)
public function viewCouriers() {
    $couriers = Courier::where('agent_id', auth()->id())->get(); // Agar filter karna ho toh: where('agent_id', auth()->id())
    return view('admin.courier.index', compact('couriers'));
}

// 4. Send SMS (Simulation)
public function sendSms($id) {
    $courier = Courier::find($id);
    // Yahan sirf message show hoga ke SMS chala gaya
    return back()->with('success', 'Delivery SMS sent to ' . $courier->phone);
}

// 1. View dikhane ke liye (ID raste se aa rahi hai)
public function showAgentWork($id)
{
    $agent = Agent::findOrFail($id);
 $couriers = Courier::where('agent_id', $id)->get();
    return view('admin.agents.view_work', compact('agent', 'couriers'));
}

// 2. Report ke liye (ID URL query se aa rahi hai ?id=1)
public function downloadBranchReport(Request $request)
{
    $id = $request->query('id'); // Query se ID pakri
    $agent = Agent::findOrFail($id);
    $couriers = Courier::where('agent_id', $id)->get();
    
    // Kyunke hum window.print use kar rahe hain, is liye bas view return karein
    return view('admin.agents.view_work', compact('agent', 'couriers'));
}



}
