<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login', ['title' => 'Connectez | SupMS']);
    }

    public function authenticate(Request $request)
    {
        // Did you mean Illuminate\Validation\Validator::validateSame() ?
        $formFields = $request->validate([
            'username' => ['required', 'string', 'regex:/\w*$/', 'max:255'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
