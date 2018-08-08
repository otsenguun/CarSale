<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        $user = Auth::user();
        if(!$user->isAdmin()) {
            return redirect('/'); //or via ->intended('/destination')
        }
        // else            
        return $next($request);        
    }
}
