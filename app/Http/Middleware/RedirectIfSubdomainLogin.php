<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfSubdomainLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        //Kiểm tra uri có phải là trang login không
        if($request->path() == 'login'){
            //Nếu là trang login thì kiểm tra xem có phải là trang login của subdomain không
            if(count($subdomain) > 2){
                //Nếu là trang login của subdomain thì xóa subdomain ra khỏi url
                $url = str_replace($subdomain[0].'.', '', url()->current());
                return redirect($url);
            }
        }
        return $next($request);
    }
}
