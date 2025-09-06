<x-ui.panel class="w-sm max-w-full m-auto self-center">
    <h2 class="text-xl font-bold text-center">Welcome</h2>
    <p class="text-center text-xs mb-4">Log in to {{config('app.name')}}.</p>

    <div hx-boost="true">
        <form method="post" action="{{route('login')}}" class="flex flex-col gap-4">
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
                                    autocomplete="current-password"
                                    required
                />
                <x-ui.control.validation-error name="password"/>
            </div>

            <x-ui.control.button size="lg" status="info"><span class="text-sm">Log in</span></x-ui.control.button>

            <div class="grid text-sm pt-2">
                <p>
                    Don't have an account? <a class="font-bold text-secondary-accent" href="{{route('register')}}">Register</a>
                </p>
                <p>
                    <a class="font-bold text-secondary-accent" href="{{route('password.request')}}">Forgot password?</a>
                </p>
            </div>
        </form>
    </div>

</x-ui.panel>

