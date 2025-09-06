<x-ui.panel class="w-sm max-w-full m-auto self-center" hx-boost="true">
    <h2 class="text-xl font-bold text-center">Set new password</h2>

    <form method="post"
          action="{{route('password.store')}}"
          hx-post="{{route('password.store')}}"
          class="flex flex-col gap-4">
        @csrf

        <input type="hidden" name="token" value="{{$token}}">

        <div class="grid gap-2">
            <x-ui.control.label for="email">Email</x-ui.control.label>
            <x-ui.control.input placeholder="Enter email address" name="email" type="email" id="email"
                                value="{{old('email')}}"
                                autocomplete="username"
                                required
            />
            <x-ui.control.validation-error name="email"/>
        </div>

        <div class="grid gap-2">
            <x-ui.control.label for="password">Password</x-ui.control.label>
            <x-ui.control.input placeholder="Enter new password" name="password" type="password" id="password"
                                autocomplete="off"
                                required
            />
            <x-ui.control.validation-error name="password"/>
        </div>

        <div class="grid gap-2">
            <x-ui.control.label for="password_confirmation">Confirm password</x-ui.control.label>
            <x-ui.control.input placeholder="Confirm new password" name="password_confirmation" type="password"
                                id="password_confirmation"
                                autocomplete="off"
                                required
            />
            <x-ui.control.validation-error name="password_confirmation"/>
        </div>

        <x-ui.control.button size="lg" status="info"><span class="text-sm">Reset password</span></x-ui.control.button>
    </form>
</x-ui.panel>
