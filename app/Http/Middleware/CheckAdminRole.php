<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user() || !$request->user()->hasRole('admin')) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied. Only admins can perform this action.',
            ], 403);
        }

        return $next($request);
    }
}

