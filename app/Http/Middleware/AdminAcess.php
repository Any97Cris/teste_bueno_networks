<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminAcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $userPermission = DB::select('select * from user_permissions where user_id = ? order by permission_id ASC limit 1',[Auth::user()->id]);
        // $permission = $userPermission[0];

        $permissionId = session('permissionId');
        
        if(Auth::check() AND $permissionId == 1){
            return $next($request);
        }

        Auth::logout();

        return redirect()->route('tela-login');

        // dd('Acesso Negado');
        
    }
}
