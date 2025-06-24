<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $auth_method, $perfil): Response
    {
        if ($auth_method == "default") {
            echo "Verificar credenciais no Banco de dados.";
        }

        if ($auth_method == "ldap") {
            echo "Verificar credenciais no AD";
        }

        if (false) {
            return $next($request);
        } else {
            return Response('Acesso negado! Usuário não autenticado!!!');
        }
    }
}
