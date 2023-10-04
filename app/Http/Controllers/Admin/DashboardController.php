<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function viewPassword()
    {
        return view('admin.auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $admin = Auth()->user();

        if (Hash::check($request->oldPassword, $admin->password)) {
            $admin->password = Hash::make($request->newPassword);
            $admin->save();
            return redirect()->route('admin.change-password')->with('success', 'Password Updated Successfully');
        } else {
            return back()->with('danger', 'Old password not match');
        }
    }
}
