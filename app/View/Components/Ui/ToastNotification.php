<?php

namespace App\View\Components\Ui;

use Closure;
use Elide\Contracts\ComponentSpecifiesSwapStrategy;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class ToastNotification extends Component implements ComponentSpecifiesSwapStrategy
{
    public readonly string $id;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string|HtmlString $message,
        public readonly int $lifespan = 5000,
        public readonly string $status = 'info',
    ) {
        $this->id = sprintf('notification-%s-%s', Str::uuid(), rand(100, 999999));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.toast-notification');
    }

    public function swapStrategy(): string
    {
        return 'beforeend:#toast-notifications';
    }
}
