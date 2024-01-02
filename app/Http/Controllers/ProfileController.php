<?php






namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @param mixed $username
     */
    public function show(Request $request, $username): View
    {
        $user = Auth::getProvider()->retrieveByCredentials([
            'username' => $username,
        ]);

        if (!$user) {
            abort(404);
        }

        $about_me = DB::table('about_me')->where('user_id', $user->id);

        if ($about_me->count() > 0) {
            $about_me = $about_me->first()->about_me;
        } else {
            $about_me = 'No about me yet.';
        }

        $avatar = DB::table('avatars')->where('user_id', $user->id);

        if ($avatar->count() > 0) {
            $avatar = 'img/avatars/' . $avatar->first()->path;
        } else {
            $avatar = 'img/placeholders/avatar.png';
        }

        return view('profile', [
            'username' => $user->username,
            'dob' => $user->dob,
            'avatar' => $avatar,
            'about' => $about_me,
        ]);
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => 'required|string|max:255',
            'password' => 'required|string|max:255|confirmed',
            'password_confirmation' => 'required|string|max:255'
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return redirect()->route('profile.show')->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        DB::table('users')->where('id', $user->id)->update([
            'password' => Hash::make($validated['password']),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('profile.show');
    }


    public function showEdit(Request $request): View
    {
        $user = Auth::user();

        $about_me = DB::table('about_me')->where('user_id', $user->id);

        if ($about_me->count() > 0) {
            $about_me = $about_me->first()->about_me;
        } else {
            $about_me = '';
        }

        return view('profile-edit', [
            'username' => $user->username,
            'about' => $about_me,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'about' => 'string|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'string|max:255|unique:users,username,' . $user->id,
        ]);

        $about_me = DB::table('about_me')->where('user_id', $user->id);

        if ($about_me->count() > 0) {
            DB::table('about_me')->where('user_id', $user->id)->update([
                'about_me' => $request->input('about'),
            ]);
        } else {
            DB::table('about_me')->insert([
                'user_id' => $user->id,
                'about_me' => $request->input('about'),
            ]);
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('img/avatars'), $filename);

            $avatar = DB::table('avatars')->where('user_id', $user->id);

            if ($avatar->count() > 0) {
                DB::table('avatars')->where('user_id', $user->id)->update([
                    'path' => $filename,
                ]);
            } else {
                DB::table('avatars')->insert([
                    'user_id' => $user->id,
                    'path' => $filename,
                ]);
            }
        }

        if ($request->input('username') != $user->username) {
            DB::table('users')->where('id', $user->id)->update([
                'username' => $request->input('username'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('profile.show');
    }

}

?>
