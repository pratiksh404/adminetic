<?php

namespace Pratiksh\Adminetic\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $hasAccess = false;
        $roles_array = explode('|', $roles);
        foreach ($roles_array as $role) {
            $hasAccess = $hasAccess || Auth::user()->hasRole($role);
        }

        return $hasAccess ? $next($request) : redirect()->back()->withFail('Sorry you don\'t have access.');
    }
}
