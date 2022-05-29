<?php

namespace Pratiksh\Adminetic\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BouncerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $password = null)
    {
        if (auth()->user()->isSuperAdmin()) {
            return $next($request);
        } elseif (! in_array(url()->current(), session()->get('verified_routes') ?? [])) {
            session()->put('destination_password', $password);
            session()->put('destination_route', url()->current());
            session()->put('destination_route_name', $request->route()->getName());

            return redirect()->route('verification_page');
        }

        return $next($request);
    }
}
