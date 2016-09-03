<?php

namespace CodeDelivery\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()){
            
            return redirect('/auth/login');
        }
        if(Auth::user()->rules <> $role){
            return redirect('/auth/login');
        
            
            
        }
        return $next($request);
    }
}