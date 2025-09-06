<?php

namespace App\Providers;

use App\View\Components\Ui\SiteNavigation;
use App\View\Components\Ui\ToastNotification;
use Elide\Htmx;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        require_once app_path('helpers.php');
        Password::defaults(function () {
            $rule = Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised();

            return $this->app->isProduction()
                ? $rule
                : Password::min(4);
        });

        Htmx::usingPartials(function () {
            $partials = [
                SiteNavigation::class,
            ];

            if ($toast = request()->session()->get('toast-notification')) {
                $partials[] = new ToastNotification($toast);
            }

            if ($toast = request()->session()->get('toast-info')) {
                $partials[] = new ToastNotification($toast);
            }

            if ($toast = request()->session()->get('toast-success')) {
                $partials[] = new ToastNotification($toast, status: 'success');
            }

            if ($toast = request()->session()->get('toast-warning')) {
                $partials[] = new ToastNotification($toast, status: 'warning');
            }

            if ($toast = request()->session()->get('toast-danger')) {
                $partials[] = new ToastNotification($toast, status: 'danger');
            }

            return $partials;
        });
    }
}
