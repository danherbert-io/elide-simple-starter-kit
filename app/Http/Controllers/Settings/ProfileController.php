<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ProfileUpdateRequest;
use App\Notifications\Profile\ProfileDeleted;
use App\View\Components\Form\Settings\DeleteProfileForm;
use App\View\Components\Form\Settings\ProfileForm;
use App\View\Components\Form\Settings\ProfilePasswordForm;
use App\View\Components\Page\Settings\Profile;
use Elide\Htmx;
use Elide\Http\HtmxRequest;
use Elide\Http\HtmxResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user's profile settings page.
     */
    public function edit(HtmxRequest $request)
    {
        $response = Htmx::render(new Profile($request->user()))
            ->title(siteTitle('Profile settings'))
            ->usingPartials(fn () => [
                new ProfileForm($request->user()),
                ProfilePasswordForm::class,
                new DeleteProfileForm($request->user()),
            ]);

        if (! str_contains($request->partialId(), 'profile')) {
            $response->filteringPartials(fn (string $_, string $id) => ! str_contains($id, 'profile'));
        }

        return $response;
    }

    /**
     * Update the user's profile settings.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return to_route('profile.edit')->with([
            'toast-success' => 'Profile updated',
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'delete_account_password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $user->notify(new ProfileDeleted);

        $session = $request->session();

        $session->invalidate();
        $session->regenerateToken();

        $session->flash('toast-success', 'Profile deleted');

        return (new HtmxResponse)->redirect(route('welcome'));
    }
}
