<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/products',
        // Add other API routes as needed
    ];
    

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the request is a POST, PUT, PATCH or DELETE request
        if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('patch') || $request->isMethod('delete')) {
            // Verify CSRF token
            if (!$request->session()->token() || $request->input('_token') !== $request->session()->token()) {
                throw new TokenMismatchException;
            }
        }

        return $next($request);
    }
}
