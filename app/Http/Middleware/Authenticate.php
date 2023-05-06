<?php

namespace App\Http\Middleware;

use App\Services\Auth\AuthService;
use App\Services\Auth\AuthSession;
use Closure;
use Illuminate\Http\Request;
use function redirect;
use function response;

class Authenticate
{
    private AuthService $service;

    public function __construct(){
        $this->service = new AuthService();
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
        if($this->service->get($request) === null) {
            return response('forbidden', 403); // TODO: implement view
        }
        return $next($request);
    }
}
