<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\Auth\AuthSession;
use Closure;
use Illuminate\Http\Request;
use function response;

class OnlyTeacher
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		/** @var AuthSession $user */
		$user = $request->user();
		if($user->getRole() !== User::ROLE_TEACHER) {
			return response('forbidden', 403);
		}
		return $next($request);
	}
}
