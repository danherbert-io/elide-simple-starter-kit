<?php

namespace App\View\Components\Form\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VerifyEmailForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly bool $notificationSent = false,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.auth.verify-email-form');
    }
}
