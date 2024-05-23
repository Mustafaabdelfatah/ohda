<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login_page()
    {

        if (Auth::guard('admin')->user()) {
            return redirect('/');
        }
        // return login page
        return view('dashboard.pages.auth.login');
    }

    public function login(Request $request)
    {

        $validatedData = $request->validate([
            'phone' => 'required|min:6',
            'password' => 'required|min:6',
        ] );

        $credential = ['phone' => $request->phone, 'password' => $request->password];

        $attempt = auth()->guard('admin')->attempt($credential);



        if($attempt){

            session()->flash('success', "تم تسجيل الدخول بنجاح");
            return redirect('/');
        }
        else{


            session()->flash('error_admin_login', "حاول مره اخري");
            return redirect('admin/login');

        }


    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
