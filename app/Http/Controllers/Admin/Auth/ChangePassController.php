<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ChangePassController extends Controller
{
    // index page
    public function index()
    {
        return view('dashboard.pages.auth.change_password');
    }
    // change password function
    public function change_pass(Request $request)
    {
        if (!(Hash::check($request->get('current_pass'), Auth::guard('admin')->user()->password))) {
            // The passwords matches
            notify()->error('كلمة السر الحالية غير صحيحة');
            return redirect()->back();
        }

        if (strcmp($request->get('current_pass'), $request->get('new_password')) == 0) {
            //Current password and new password are same
            notify()->error('يجب اختيار كلمة مرور مختلفة عن كلمة السر الحالية');

            return redirect()->back();
        }

        if ($request->get('new_password_confirmation') != $request->get('new_password')) {
            //Current password and new password are same
            notify()->error('تأكيد كلمة السر غير مطابقة لكلمة السر الجديدة');

            return redirect()->back();
        }

        $validatedData = $request->validate([
            'current_pass' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $admin = Auth::guard('admin')->user();
        $admin->password = bcrypt($request->get('new_password'));
        $admin->save();
        notify()->success('تم تغير كلمة السر بنجاح');
        return redirect()->back();

    }
}