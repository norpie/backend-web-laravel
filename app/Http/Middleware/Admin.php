<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $isAdmin = $this->isAdmin($user);
        if (!$isAdmin) {
            abort(404);
        }
        return $next($request);
    }

    public function isAdmin(User $user): bool
    {
        $admin = DB::table('admins')->where('user_id', $user->id)->first();

        if ($admin) {
            return true;
        } else {
            return false;
        }
    }
}
