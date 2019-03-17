<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{

    const INVALID_PATHS = [
        'impersonate',
        'login'
    ];

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        $loginUrl = $this->validBackPath($request->path()) ? route('login') . '?back=' . $request->path() : route('login');
        return $loginUrl;
    }

    /**
     * Valid back path.
     *
     * @param $path
     * @return bool
     */
    private function validBackPath($path) {
        if ($path) {
            if (collect(self::INVALID_PATHS)->first(function ($value) use ($path) {
                return Str::startsWith($path,$value) || Str::startsWith($path,'/'. $value);
            })) return false;
        }
        return true;
    }
}
