<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessControlByUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
//        if (!auth()->check()) {
//            return redirect()->route('login');
//        }


        $user = auth()->user();
        $routeName = $request->route()->getName();



        if(auth()->check()) {
            if ($user->usertype == 'admin' && $routeName == 'home' ){
                Auth()->logout();

            }
            if ($user->usertype == 'user' && $routeName === 'admin.index') {
                flash('you are not authorized to access this page')->error();
                return redirect()->route('front.index');
            } elseif ($user->usertype == 'admin' && $routeName === 'front.index') {
                flash('you are not authorized to access this page')->error();
                return redirect()->route('admin.index');
            }
        }

        return $next($request);
    }
}
