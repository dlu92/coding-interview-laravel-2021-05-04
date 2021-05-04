<?php

/**
 * @author David Luis
 * Description:
 * This class is used to detect the language of the client device to display
 * the platform in the appropriate language.
 * 
 */

namespace App\Http\Middleware;

// Libs
use Jenssegers\Agent\Agent;
use Closure;

class LanguageAutodetection
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

        $locale = (new Agent())->languages();

        try{

            $locale = substr(data_get($locale, '0', ''), 0, 2);

            if($locale != ''){
                app()->setLocale($locale);
            } else {
                app()->setLocale('en');
            }

        } catch(\Exception $error){
            app()->setLocale('en');
        }

        return $next($request);

    }

}
