<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use function response;
use function view;

class AuthController extends Controller
{
    private AuthService $service;

    public function __construct(){
        $this->service = new AuthService();
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->post('username');
        $password = $request->post('password');

        /** @var User $user */
        $user = User::query()->where('name', '=', $username)->first();
        if($user === null || !$user->isPasswordValid($password)) {
            $request->session()->flash('login_error', 'Invalid username or password');
            return response()->view('pages.auth.login', [], 401);
        }
        $this->service->set($request, $user);
        return response('authenticated', 200); // TODO: implement view
    }
}
