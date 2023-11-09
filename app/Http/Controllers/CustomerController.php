<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name',
            'phone'
        ]);
        $name = $request->name;
        $phone = $request->phone;
        $customer = new Customer();
        $customer->name = $name;
        $customer->phone = $phone;
        $customer->save();
        return redirect()->back();
    }

    public function index()
    {
        $customers = Customer::all();
        if (Auth::user()->roles()->first()->name == 'admin') {
            return view('dashboard', compact('customers'));
        } else {
            abort(403);
        }
    }
    public function updateStatus(Request $request, Customer $customer)
    {
        $request->validate([
            'status' => 'required|in:Yangi,Bog\'lanilgan,Bog\'lanilmagan',
        ]);

        $customer->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
