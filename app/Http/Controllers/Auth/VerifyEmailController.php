<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\Profile\Welcome;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(route('welcome', absolute: false).'?verified=1')
                ->with('toast-success', 'Account verified');
        }

        $request->fulfill();

        $user->notify(new Welcome);

        return redirect()->intended(route('welcome', absolute: false).'?verified=1')
            ->with('toast-success', 'Account verified');
    }
}
