<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // Tenta autenticar o usuário
        $guard = $guards[0] ?? null;
        
        if (Auth::guard($guard)->guest()) {
            // Se não autenticado, retorna uma resposta 401
            return response()->json(['error' => 'Unauthorized'], status: 401);
        }

        return $next($request);
    }
}
