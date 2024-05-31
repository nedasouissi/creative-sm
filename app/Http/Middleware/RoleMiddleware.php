<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{

    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        foreach ($roles as $role) {
            if ($user->role === $role) {
                return $next($request);
            }
        }

        return redirect()->back()->with('error', "You don't have access to this page.");
    }
}
