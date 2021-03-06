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

        if ($request->is('chapters/*/topics/*/lesson/create')) {
            if (!Auth::user()->hasPermissionTo('tambah-pelajaran')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('chapters/*/topics/*/lesson/*/edit')) {
            if (!Auth::user()->hasPermissionTo('edit-pelajaran')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('chapters/*/topics/*/lesson/*/Delete')) {
            if (!Auth::user()->hasPermissionTo('hapus-pelajaran')) {
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

        if ($request->is('gallery/create')) 
        {
            if (!Auth::user()->hasPermissionTo('tambah-gallery')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('gallery/*/edit'))
        {
            if (!Auth::user()->hasPermissionTo('edit-gallery')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) 
        {
            if (!Auth::user()->hasPermissionTo('hapus-gallery')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('slider/create')) {
            if (!Auth::user()->hasPermissionTo('tambah-slider')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('slider/*/edit')) {
            if (!Auth::user()->hasPermissionTo('edit-slider')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) {
            if (!Auth::user()->hasPermissionTo('hapus-slider')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('cms/create')) {
            if (!Auth::user()->hasPermissionTo('tambah-cms')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('cms/*/edit')) {
            if (!Auth::user()->hasPermissionTo('edit-cms')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) {
            if (!Auth::user()->hasPermissionTo('hapus-cms')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('news/create')) {
            if (!Auth::user()->hasPermissionTo('tambah-berita')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('news/*/edit')) {
            if (!Auth::user()->hasPermissionTo('edit-berita')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) {
            if (!Auth::user()->hasPermissionTo('hapus-berita')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('newsCategories/create')) {
            if (!Auth::user()->hasPermissionTo('tambah-kategori-berita')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('newsCategories/*/edit')) {
            if (!Auth::user()->hasPermissionTo('edit-kategori-berita')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) {
            if (!Auth::user()->hasPermissionTo('hapus-kategori-berita')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('messages/create')) {
            if (!Auth::user()->hasPermissionTo('kirim-pesan')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
