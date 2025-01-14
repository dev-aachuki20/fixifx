<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class Localization
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
        // if (session()->has('locale')) {
        //     App::setlocale(session()->get('locale'));
        // } else {
        //     App::setlocale('ja');
        // }
        
        $languageSegment = $request->segment(1);

        $supportedLanguages = ['en', 'ja'];
        if (in_array($languageSegment, $supportedLanguages)) {
            app()->setLocale($languageSegment);
        } else {
            app()->setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
