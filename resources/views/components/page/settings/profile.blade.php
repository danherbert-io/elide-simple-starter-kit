<div>
    <x-ui.panel class="grid gap-4">
        @if($needsVerification && !$user->hasVerifiedEmail())
            <x-ui.control.button
                hx-boost="true"
                href="{{route('verification.notice')}}"
                status="success" class="me-auto">
                Verify your account
            </x-ui.control.button>
        @else
            @htmxPartial('profile-form')
            <hr class="opacity-10 my-4">
            @htmxPartial('profile-password-form')
        @endif

        <hr class="opacity-10 mt-4 mb-8">
        @htmxPartial('delete-profile-form')
    </x-ui.panel>
</div>
