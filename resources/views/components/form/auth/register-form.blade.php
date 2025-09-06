<x-ui.panel class="w-sm max-w-full m-auto self-center" hx-boost="true">

    <h2 class="text-xl font-bold text-center">Register</h2>

    <form action="{{route('register')}}" method="post" class="flex flex-col gap-4">
        <div class="grid gap-2">
            <x-ui.control.label for="name">Name</x-ui.control.label>
            <x-ui.control.input placeholder="Enter name" name="name" type="name" id="name" value="{{old('name')}}"
                                autocomplete="name"
                                required
            />
            <x-ui.control.validation-error name="name"/>
        </div>

        <div class="grid gap-2">
            <x-ui.control.label for="email">Email</x-ui.control.label>
            <x-ui.control.input placeholder="Enter email address" name="email" type="email" id="email" value="{{old('email')}}"
                                autocomplete="username"
                                required
            />
            <x-ui.control.validation-error name="email"/>
        </div>

        <div class="grid gap-2">
            <x-ui.control.label for="password">Password</x-ui.control.label>
            <x-ui.control.input placeholder="Enter password" name="password" type="password" id="password"
                                autocomplete="off"
                                required
            />
            <x-ui.control.validation-error name="password"/>
        </div>

        <div class="grid gap-2">
            <x-ui.control.label for="password_confirmation">Confirm password</x-ui.control.label>
            <x-ui.control.input placeholder="Confirm password" name="password_confirmation" type="password" id="password_confirmation"
                                autocomplete="off"
                                required
            />
            <x-ui.control.validation-error name="password_confirmation"/>
        </div>

        <x-ui.control.button size="lg" status="info"><span class="text-sm">Register</span></x-ui.control.button>
    </form>

</x-ui.panel>
