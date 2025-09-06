<?php

namespace App\View\Components\Ui\Control;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string|HtmlString|null $placeholder = null,
        public readonly ?string $value = null,
        public readonly array $choices = [],
        public readonly array $choiceAttributes = [],
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.control.select');
    }
}
