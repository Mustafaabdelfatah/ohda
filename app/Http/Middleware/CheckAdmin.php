<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{

    public function handle(Request $request, Closure $next, $guard='admin')
    {

        if(Auth::guard('admin')->user()->type == 'admin'){
            return $next($request);
        }else{
             alert()->success('Success Message', 'You do not have access permission');
            return redirect()->back();
         }


    }
}