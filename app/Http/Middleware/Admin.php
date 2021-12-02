<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if( !auth()->user() ){
            return redirect()->route('login');
        }

        if (auth()->user()->is_admin){
            return $next($request);
        }
        
        return back()->with('error', "Only admin can access!");
    }
}
