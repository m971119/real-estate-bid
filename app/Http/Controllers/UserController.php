<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request)
    {
        return \inertia('Auth/Register');
    }

    public function store(Request $request)
    {
        // Laravel 10x default hashes the pw when save
        // No need to hash: $user->password = Hash::make($user->password);
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]));
        Auth::login($user);
        return redirect()->route('listing.index')
            ->with('success', 'Account created!');
    }
}
