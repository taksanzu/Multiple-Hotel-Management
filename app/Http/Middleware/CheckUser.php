<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        if(count($subdomain) > 2){
            $user = User::where('status', 0)->where('domain', $subdomain[0])->with('settings','rooms.roomImages', 'images', 'news')->first();
            if($user == null){
                return response()->view('mainpages.pages.404', [], 404);            }
        }
        return $next($request);
    }
}
