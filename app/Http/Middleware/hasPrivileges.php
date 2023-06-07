<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class hasPrivileges
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $route = $request->route()->getName();
        $state = DB::table('menus')->where('route', $route);
        $result = 0;
        if (auth()->user()->is_developer) {
            $result = $state->where('for_developer', true)->where('maintenance', false)->count();
        } elseif (auth()->user()->is_teacher) {
            $result = $state->where('for_teacher', true)->where('maintenance', false)->count();
        } elseif (auth()->user()->is_student) {
            $result = $state->where('for_student', true)->where('maintenance', false)->count();
        }
        if ($result > 0) {
            return $next($request);
        } else {
            return redirect()->route('dashboard')->with(['denied' => ['message' => "You Don't Have Permission To Access " . $route . ' Page Or The Page Is Under Maintenance']]);
        }
    }
}
