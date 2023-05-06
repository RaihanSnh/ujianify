<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\Auth\UserJWT;
use Closure;
use Illuminate\Http\Request;
use function response;

class OnlyStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var UserJWT $user */
        $user = $request->user();
        if($user->getRole() === User::ROLE_STUDENT) {
            return response('forbidden', 403);
        }
        return $next($request);
    }
}
