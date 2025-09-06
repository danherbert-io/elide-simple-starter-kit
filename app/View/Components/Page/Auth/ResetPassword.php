<?php

namespace App\View\Components\Page\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResetPassword extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.auth.reset-password');
    }
}
