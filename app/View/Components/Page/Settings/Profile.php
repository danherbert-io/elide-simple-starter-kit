<?php

namespace App\View\Components\Page\Settings;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Profile extends Component
{
    public readonly bool $needsVerification;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly User $user,
    ) {
        $this->needsVerification = $user instanceof MustVerifyEmail;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.settings.profile');
    }
}
