<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class isAdmin
{
     
    public function handle(Request $request, Closure $next)
    {
      // check if not admin return to admin login page
       

      if (!Auth::guard('admin')->check()) {
        return redirect('admin/login');
      } 
        return $next($request);
    }
}
