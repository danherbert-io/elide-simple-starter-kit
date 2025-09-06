<x-ui.panel class="w-sm max-w-full m-auto self-center" hx-boost="true">
    <h2 class="text-xl font-bold text-center">Forgot your password?</h2>
    <p class="text-center text-xs mb-4">Enter your account's email address, and we'll send you a link to reset your
        password.</p>

    @if(!request()->session()->get('password-reset-sent'))

    <form method="post" action="{{route('password.email')}}" class="flex flex-col gap-4">
        <div class="grid gap-2">
            <x-ui.control.input placeholder="Enter email address" name="email" type="email" id="email" value="{{old('email')}}"
                                autocomplete="username"
                                required
            />
            <x-ui.control.validation-error name="email"/>
        </div>

        <x-ui.control.button size="lg" status="info"><span class="text-sm">Request reset link</span></x-ui.control.button>
    </form>
    @else
        <p>A reset link will be sent if the account exists.</p>
    @endif
</x-ui.panel>
