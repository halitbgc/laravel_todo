<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
class RegisteredUserController extends Controller
{
    public function create(): View {
        return view('/pages.auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse 
    {   
        $validated_data = $request->validated();

        // Create the user
        $user = User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => Hash::make($validated_data['password']),
        ]);

        // Log in the user
        Auth::login($user);

        return redirect()->route('todos.index');
    }
}
