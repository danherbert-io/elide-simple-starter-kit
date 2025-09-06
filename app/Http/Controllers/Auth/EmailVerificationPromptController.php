<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\View\Components\Form\Auth\VerifyEmailForm;
use App\View\Components\Page\Auth\VerifyEmail;
use Elide\Htmx;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Show the email verification prompt page.
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(route('welcome', absolute: false))
            : Htmx::render(VerifyEmail::class)->usingPartials(fn () => [
                new VerifyEmailForm(notificationSent: $request->session()->get('verification-sent') === true),
            ]);
    }
}
