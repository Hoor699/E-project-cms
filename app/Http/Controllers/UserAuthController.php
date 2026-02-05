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
        // Auth::user()->email se sirf Ajwa ka data uthayenge
        // Agar aapke model ka naam 'Courier' hai toh wahi use karein
        $customers = Courier::where('sender_email', Auth::user()->email)->get();
        
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
        'role' => 'required' // admin ya agent
    ]);

    // Naya user create karna
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role, 
    ]);

    return back()->with('success', 'Naya ' . $request->role . ' kamyabi se add ho gaya!');
}
}