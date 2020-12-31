<?php

namespace App\Http\Middleware;

use Closure, Auth;

class isAdmin
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
        if (Auth:: usuarios() -> tipousuario == "0"):
            return $next($request);
        else:
            return redirect('/');
        endif;
    }
}
