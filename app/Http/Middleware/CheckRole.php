<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $authUserRole = Auth::user()->role->title;
            foreach ($roles as $role){
                if($role == $authUserRole){
                    return $next($request);
                }
            }
        }
        return redirect()->route('home')->with('error', 'Доступ к данному разделу разрешен только Администратору!');
    }
}
