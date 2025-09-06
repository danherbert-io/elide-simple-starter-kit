<?php

namespace App\View\Components\Form\Settings;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteProfileForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly User $user,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.settings.delete-profile-form');
    }
}
