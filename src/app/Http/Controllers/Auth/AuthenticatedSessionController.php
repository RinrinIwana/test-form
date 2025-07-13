<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request, LoginResponse $response)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'メールアドレスかパスワードが正しくありません。',
            ]);
        }

        $request->session()->regenerate();

        // ✅ ここでリダイレクト先を指定する
        return redirect()->intended('/admin');
    }
}
