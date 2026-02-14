<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Courier; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // Ajwa ka Dashboard (Ab ye redirect hoga ya list dikhayega)
    public function userDashboard()
    {
        // Redirecting to customer list as per your requirement
        return redirect()->route('user.customer.list');
    }

    // --- YE NAYA FUNCTION HAI JO ERROR KHATAM KAREGA ---
public function customerList()
{
    $user = Auth::user();

    // Agar login wala banda Agent hai, toh saare couriers dikhao
    if ($user->role == 'agent') {
        $customers = Courier::all(); 
    } 
    // Agar normal user hai, toh sirf uski apni bookings
    else {
        $customers = Courier::where('sender_email', $user->email)->get();
    }

    return view('user.customer_list', compact('customers'));
}

    public function showRegister()
    {
       return view('Website.register');
    }

    public function showLogin()
    {
        return view('user.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role user set kar diya
        ]);

        return redirect()->route('user.login')->with('success', 'User Registered successfully!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            if($user->role == 'admin' || $user->role == 'staff') {
                 return redirect()->route('admin.dashboard'); 
            } else {
                 return redirect()->route('user.customer.list'); 
            }
        }

        return back()->withErrors([
            'email' => 'Email ya password sahi nahi hai.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); 
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'user') {
            return redirect()->route('user.customer.list');
        }

        return redirect('/');
    }
    public function storeUserByAdmin(Request $request)
{
    // Validation
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'role' => 'required' ,// admin ya agent
        'city' => 'nullable' // City add karein
    ]);

    // Naya user create karna
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'city' => $request->city, // City save karna zaroori hai agent ke liye 
        
    ]);

    return back()->with('success', 'Naya ' . $request->role . ' kamyabi se add ho gaya!');
}
public function editStatus($id)
{
    // Sirf wahi courier uthayenge jo update karna hai
    $courier = Courier::findOrFail($id);
    
    // Aapki file ka path yahan check karein
    return view('user.agent_edit', compact('courier'));
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required'
    ]);

    $courier = Courier::findOrFail($id);
    $courier->update([
        'status' => $request->status
    ]);

    return redirect()->route('user.customer.list')->with('success', 'Status kamyabi se update ho gaya!');
}
}