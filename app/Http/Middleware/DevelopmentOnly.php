<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DevelopmentOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (getenv('APP_ENV') == "local" || "development")
        {
            return $next;
        }
        else
        {
            return abort(423);
        }
    }
}
