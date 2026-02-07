<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if locale is in session (highest priority)
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            App::setLocale($locale);
        }
        // Check if locale is in request (from URL parameter)
        elseif ($request->has('lang')) {
            $locale = $request->get('lang');
            if (in_array($locale, ['ar', 'en'])) {
                App::setLocale($locale);
                Session::put('locale', $locale);
            }
        }
        // Default to Arabic
        else {
            App::setLocale('ar');
            Session::put('locale', 'ar');
        }

        return $next($request);
    }
}
