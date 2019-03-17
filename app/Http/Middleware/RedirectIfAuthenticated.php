<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RedirectIfAuthenticated
{
    const INVALID_PATHS = [
        'impersonate',
        'login'
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $redirectUrl = $this->validBackPath($request->query('back')) ? $request->query('back') : '/home';
        if (Auth::guard($guard)->check()) {
            return redirect($redirectUrl);
        }
        return $next($request);
    }
    /**
     * Valid back path.
     *
     * @param $path
     * @return bool
     */
    private function validBackPath($path)
    {
        if ($path) {
            if (collect(self::INVALID_PATHS)->first(function ($value) use ($path) {
                return Str::startsWith($path, $value) || Str::startsWith($path, '/' . $value);
            })) return false;
        }
        return true;
    }
}
