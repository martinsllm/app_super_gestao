<?php

namespace App\Http\Middleware;

use App\Models\LogAcessos;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();

        LogAcessos::create(['log' => "IP $ip requisitou acesso a rota $route"]);

        return $next($request);
    }
}
