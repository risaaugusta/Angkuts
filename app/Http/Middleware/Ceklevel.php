<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle(Request $request, Closure $next, ...$levels)
    {

        // if (!Auth::check()) {
        //     return redirect()->route('/login');
        // }

        // if (Auth::user()->role == 1) {
        //     return redirect()->route('/user');
        // }

        // if (Auth::user()->role == 2) {
        //     return redirect()->route('admin');
        // }

        // if (Auth::user()->role == 3) {
        //     return redirect()->route('petugas');
        // }

        // $user = Auth::user()->level;
        // // var_dump($user);
        // // dd($levels);
        // if ($user == $levels[0]) {
        //     // redirect($levels[0]);
        //     return $next($request);
        // }

        // return redirect('/login');
        // abort(403);

        // if(! $request->user()->levels == $levels) {
        //     return $next($request);
        // }

        // return redirect('/');

        if (in_array($request->user()->level,$levels)){
            return $next($request);
        }
        return redirect('/');
    }
}
