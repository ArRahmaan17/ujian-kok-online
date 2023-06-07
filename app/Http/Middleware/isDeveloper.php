<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isDeveloper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        if (auth()->user()->is_developer) {
            return $next($request);
        } else {
            return redirect()->route('dashboard')->with(['denied' => ['message' => "You Don't Have Permission To Access Developer Page "]]);
        }
    }
}
