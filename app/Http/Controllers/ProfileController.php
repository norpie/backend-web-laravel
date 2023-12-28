<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

}

?>
