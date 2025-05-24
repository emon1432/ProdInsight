<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Permission
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role->id == 1) {
            return $next($request);
        }
        $routeName = $request->route()->getName();
        if (!check_permission($routeName)) {
            if (request()->ajax()) {
                return response()->json([
                    'status' => 403,
                    'message' => __('You do not have permission to access this page'),
                ]);
            }
            notify()->error('You do not have permission to access this page');
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
