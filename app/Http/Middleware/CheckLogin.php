<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $_COOKIE['login']??'';
        if(!$data){
            return redirect()->route('login');
        }
        $data = json_decode($data,'true');
        $request->_id = $data['id'];
        $request->_account = $data['account'];
        return $next($request);
    }
}
