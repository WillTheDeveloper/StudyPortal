<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OwnerOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $model=null)
    {
        if ((new $model)->query()->where('user_id', auth()->id())->exists()) {
            return $next($request);
        }
        $modelName = explode('\\', $model);
        return abort(401, 'You are not the owner of this ' . end($modelName));
    }
}
