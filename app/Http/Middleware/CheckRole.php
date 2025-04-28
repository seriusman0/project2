<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            if ($request->user()) {
                // Redirect to appropriate dashboard based on role
                switch ($request->user()->role) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'student':
                        return redirect()->route('student.dashboard');
                    case 'parent':
                        return redirect()->route('parent.dashboard');
                }
            }
            return redirect('/');
        }

        return $next($request);
    }
}
