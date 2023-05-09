<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseFormatter;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if(request()->user()->hasRole('admin')){
                return $next($request);
            } else {
                return ResponseFormatter::error(null, 'Unauthorized', 401);
            }
        } else {
            return ResponseFormatter::error(null, 'You must login to access this data', 401);
        }
    }
}
