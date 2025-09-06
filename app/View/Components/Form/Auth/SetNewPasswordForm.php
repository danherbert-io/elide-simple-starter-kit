<?php

namespace App\View\Components\Form\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SetNewPasswordForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $email,
        public readonly string $token,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.auth.set-new-password-form');
    }
}
