<?php





namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function show(): View
    {
        return view('auth.register');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'username' => ['required', 'string', 'unique:users'],
            'dob' => ['required', 'date'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        $remember = $request->has('remember');

        if ($credentials['password'] !== $credentials['password_confirmation']) {
            return back()->withErrors(['password' => 'Passwords do not match']);
        }

        $user = new User();
        $user->email = $credentials['email'];
        $user->username = $credentials['username'];
        $user->dob = $credentials['dob'];
        $user->password = Hash::make($credentials['password']);
        $user->save();

        Auth::login($user, $remember);
        return redirect()->route('dashboard');
    }
}

?>
