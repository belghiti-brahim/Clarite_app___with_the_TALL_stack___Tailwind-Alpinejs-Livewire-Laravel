<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

        $user = Auth::user();
        if ($user) {
            $locale = $user->language;
        } else {
            $accepted_language = $request->header('accept-language');
            $languageArray = explode(',', $accepted_language);
            $locale = $languageArray[0] ?? 'en';

            if (request('language')) {
                $locale = $request->query('language', Session::get('language', 'en'));
            }
            Session::put('language', $locale);
        }

        App::setLocale($locale);
        return $next($request);
    }
}
