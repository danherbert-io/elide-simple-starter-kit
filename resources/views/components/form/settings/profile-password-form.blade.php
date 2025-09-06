<div class="w-full m-auto">

    <h2 class="text-xl font-bold">Password</h2>

    <form
        action="{{route('password.update')}}"
        hx-post="{{route('password.update')}}"
        method="post"
        class="flex flex-col gap-4">
        @csrf
        @method('put')
        <div class="grid gap-2">
            <x-ui.control.label for="current_password">Current password</x-ui.control.label>
            <x-ui.control.input placeholder="Enter current password" name="current_password" type="password" id="current_password"
                                autocomplete="off"
                                required
            />
            <x-ui.control.validation-error name="current_password"/>
        </div>

        <div class="grid gap-2">
            <x-ui.control.label for="password">New password</x-ui.control.label>
            <x-ui.control.input placeholder="Enter new password" name="password" type="password" id="password"
                                autocomplete="off"
                                required
            />
            <x-ui.control.validation-error name="password"/>
        </div>

        <div class="grid gap-2">
            <x-ui.control.label for="password_confirmation">Confirm new password</x-ui.control.label>
            <x-ui.control.input placeholder="Confirm password" name="password_confirmation" type="password" id="password_confirmation"
                                autocomplete="off"
                                required
            />
            <x-ui.control.validation-error name="password_confirmation"/>
        </div>

        <x-ui.control.button size="lg" status="info" class="me-auto">
            <span class="text-sm">
                Save password
            </span>
        </x-ui.control.button>
    </form>

</div>
