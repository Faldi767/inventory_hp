<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CekSession
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
        if ($request->session()->has('nama')) {
            
        } else {
            return redirect('role');
        }
        return $next($request);
    }
}
