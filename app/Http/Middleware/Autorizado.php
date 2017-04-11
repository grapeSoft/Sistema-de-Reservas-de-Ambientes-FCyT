<?php

namespace App\Http\Middleware;

use Closure;

class Autorizado
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
        $id = explode('/', $request->path(), 3)[1];
        //dd(auth()->user()->esAdministrador()||(auth()->user()->esAutorizado() && auth()->user()->id() == $id));
        if((auth()->user()->esAutorizado() && auth()->user()->id() == $id)){
            return $next($request);
        }
        else{
            if(auth()->user()->esAdministrador())
                return $next($request);
            else
                abort(403);
        }
    }
}
