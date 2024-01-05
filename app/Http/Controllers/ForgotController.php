<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ForgotController extends Controller
{

    public function show()
    {
        return view('auth.forgot');
    }

    public function resetRequest(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showReset(Request $request, string $token): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => $request->password
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

}

?>
