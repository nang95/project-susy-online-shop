<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pelanggan
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
        if (auth()->user()->roles()->pluck('nama')->first() == "pelanggan") {
            return $next($request);
        }
    }
}
