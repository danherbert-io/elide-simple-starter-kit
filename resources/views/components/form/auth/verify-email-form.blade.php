<div>
    @if($notificationSent)
        <p class="font-bold">Email verification email has been sent. Please check your inbox.</p>
    @else
        <form method="POST"
              action="{{ route('verification.send') }}"
              hx-post="{{ route('verification.send') }}"
              >
            @csrf

            <div>
                <x-ui.control.button status="warning">
                    {{ __('Resend Verification Email') }}
                </x-ui.control.button>
            </div>
        </form>
    @endif
</div>
