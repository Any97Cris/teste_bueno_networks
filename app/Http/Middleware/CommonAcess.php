<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CommonAcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userPermission = DB::select('select * from user_permissions where user_id = ? order by permission_id ASC limit 1',[Auth::user()->id]);
        $permission = $userPermission[0];
        
        if(Auth::check() AND $permission->permission_id == 2){
            return $next($request);
        }

        Auth::logout();

        return redirect()->route('tela-login');

        // dd('Acesso Negado');

    }
}
