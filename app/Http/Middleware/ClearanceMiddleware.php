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

        if ($request->is('chapters/create')) 
        {
            if (!Auth::user()->hasPermissionTo('tambah-bab')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('chapters/*/edit'))
        {
            if (!Auth::user()->hasPermissionTo('edit-bab')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) 
        {
            if (!Auth::user()->hasPermissionTo('hapus-bab')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('chapters/*/topics/create')) {
            if (!Auth::user()->hasPermissionTo('tambah-materi')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('chapters/*/topics/*/edit')) {
            if (!Auth::user()->hasPermissionTo('edit-materi')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('chapters/*/topics/Delete')) {
            if (!Auth::user()->hasPermissionTo('hapus-materi')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        

        if ($request->is('users/create')) 
        {
            if (!Auth::user()->hasPermissionTo('tambah-user')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('users/*/edit'))
        {
            if (!Auth::user()->hasPermissionTo('edit-user')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) 
        {
            if (!Auth::user()->hasPermissionTo('hapus-user')) {
                abort('401');
            } else {
                return $next($request);
            }
        }


        return $next($request);
    }
}
