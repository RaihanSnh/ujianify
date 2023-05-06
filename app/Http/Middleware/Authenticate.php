<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\Auth\AuthService;
use Closure;
use Illuminate\Http\Request;
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
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		$user = $this->service->get($request);
		if($user === null) {
			return response('forbidden', 403);
		}
		$request->setUserResolver(fn() => $user);
		return $next($request);
	}
}
