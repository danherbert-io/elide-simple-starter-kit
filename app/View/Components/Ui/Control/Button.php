<?php

namespace App\View\Components\Ui\Control;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Button extends Component
{
    public readonly string $status;

    public readonly string $size;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string|HtmlString|null $label = null,
        public readonly ?string $href = null,
        ?string $status = null,
        ?string $size = null,
    ) {
        $this->status = match ($status) {
            'info', 'success', 'warning', 'danger', 'raw' => $status,
            default => 'normal',
        };
        $this->size = match ($size) {
            'xs', 'sm', 'lg', 'raw' => $size,
            default => 'md',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.control.button');
    }
}
