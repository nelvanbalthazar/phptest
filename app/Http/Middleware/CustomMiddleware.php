<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
class CustomMiddleware
{
    protected $loginPath = 'login';

    public function handle($request, Closure $next) 
    {
        
         
        $logged_in = $request->session()->put(['login'=>request]);

            if (!$logged_in) 
            {
                return redirect()->guest('login')->with('flag','1');
            }
            return $next($request);
    }
    
}
