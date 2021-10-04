<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Request;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $route = $request->route();
        $subdomain = $route->parameter('subdomain');
        if (!$request->expectsJson()) {
            if (Arr::first($this->guards) === 'admin') {
                return route('get.admin.login');
            } elseif (Arr::first($this->guards) === 'vendor') {
                return route('get.vendor.login', compact('subdomain'));
            } else {
                return route('login');
            }
        }
    }
}
