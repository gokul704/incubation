<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Author
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        

        if (Auth::check() && Auth::user()->role == '2') {
            return $next($request);
        }
        else if(Auth::check() && Auth::user()->role == '1'){
            return redirect('/home');
        }
        else{
            return redirect(' login');
        }
        // return $next($request);
    }
}
