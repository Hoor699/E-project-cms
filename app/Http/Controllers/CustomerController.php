<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Customers ki list dikhane ke liye
    public function index() {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    // Customer delete karne ke liye
    public function destroy($id) {
        Customer::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Customer record deleted!');
    }
}
