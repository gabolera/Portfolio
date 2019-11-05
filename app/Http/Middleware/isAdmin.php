<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->permisson == 3){
                return $next($request);
            }
        }
        
        return redirect('/');
    }
}
