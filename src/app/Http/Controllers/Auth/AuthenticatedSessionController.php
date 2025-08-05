<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function create(): View 
    {
        return view('/pages.auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->route('todos.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function destroy(Request $request): RedirectResponse 
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.create');
    }
}
