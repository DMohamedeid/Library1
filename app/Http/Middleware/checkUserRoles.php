<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkUserRoles
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
        if(Auth::user()->hasAnyRoles(['superadmin' , 'admin'])) {

            return $next($request);
        }

        abort(403,'Not Authorized');
    }
}
