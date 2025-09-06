<div class="w-full m-auto" >

    <h2 class="text-xl font-bold">Profile</h2>

    <form
        action="{{route('profile.update')}}"
        hx-post="{{route('profile.update')}}"
        method="post"
        class="flex flex-col gap-4">
        @csrf
        @method('patch')
        <div class="grid gap-2">
            <x-ui.control.label for="name">Name</x-ui.control.label>
            <x-ui.control.input placeholder="Enter name" name="name" type="name" id="name" value="{{old('name', $user->name)}}"
                                autocomplete="name"
                                required
            />
            <x-ui.control.validation-error name="name"/>
        </div>

        <div class="grid gap-2">
            <x-ui.control.label for="email">Email</x-ui.control.label>
            <x-ui.control.input placeholder="Enter email address" name="email" type="email" id="email" value="{{$user->email}}"
                                autocomplete="username"
                                disabled
            />
            <small>Your email address cannot be changed.</small>
            <x-ui.control.validation-error name="email"/>
        </div>

        <x-ui.control.button size="lg" status="info" class="me-auto">
            <span class="text-sm">
                Save profile
            </span>
        </x-ui.control.button>
    </form>

</div>
