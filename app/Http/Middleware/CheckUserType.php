<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next  ): Response
    {

        if (!auth()->check()) {
            return redirect()->route('login');
        }



        $user = auth()->user();

        if ($user->usertype == 'user') {
            return redirect()->route('front.index');
        } elseif ($user->usertype == 'admin') {
            return redirect()->route('admin.index');
        }


        return $next($request);


    }
}
