<?php

namespace App\Http\Middleware\Elide;

use App\View\Components\Ui\ToastNotification;
use Closure;
use Elide\Htmx;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IncludeToastNotifications
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $partials = [];

        $session = $request->session();

        if ($toast = $session->get('toast-notification')) {
            $partials[] = new ToastNotification($toast);
        }

        if ($toast = $session->get('toast-info')) {
            $partials[] = new ToastNotification($toast);
        }

        if ($toast = $session->get('toast-success')) {
            $partials[] = new ToastNotification($toast, status: 'success');
        }

        if ($toast = $session->get('toast-warning')) {
            $partials[] = new ToastNotification($toast, status: 'warning');
        }

        if ($toast = $session->get('toast-danger')) {
            $partials[] = new ToastNotification($toast, status: 'danger');
        }

        if (count($partials)) {
            Htmx::usingPartials(fn () => $partials);
        }

        return $next($request);
    }
}
