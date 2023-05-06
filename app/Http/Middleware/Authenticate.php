<?php

namespace App\Http\Middleware;

use App\Services\Auth\AuthJWTService;
use App\Services\Auth\UserJWT;
use Closure;
use Illuminate\Http\Request;
use function redirect;
use function response;

class Authenticate
{
    private AuthJWTService $service;

    public function __construct(){
        $this->service = new AuthJWTService();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->hasCookie('UserSessionJWT')) {
            return redirect($request->query('auth_redirect', '/'));
        }
        return $next($request);
    }
}
