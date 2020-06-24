<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware
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
        if (Auth::user()->hasPermissionTo('Superadmin')) //If user has this //permission
        {
            return $next($request);
        }

        if ($request->is('chapters/create')) //If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('tambah-bab')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('chapters/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('edit-bab')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('hapus-bab')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
