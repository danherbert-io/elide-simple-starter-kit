<?php

namespace App\Http\Middleware\Elide;

use App\View\Components\Ui\SiteNavigation;
use Closure;
use Elide\Htmx;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetupAppView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Htmx::usingPartials(fn () => [
            SiteNavigation::class,
        ]);

        return $next($request);
    }
}
