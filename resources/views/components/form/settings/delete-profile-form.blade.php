<div class="w-full m-auto text-red-500">

    <h2 class="text-xl font-bold">Delete account</h2>
    <small>
        Delete your account and all of its resources.<br>
        Proceed with caution - this cannot be undone.</small>

    <form
        action="{{route('profile.destroy')}}"
        hx-post="{{route('profile.destroy')}}"
        method="post" class="flex flex-col gap-4 my-4"
          hx-confirm="Are you sure you want to delete your account? This cannot be undone."
    >
        @csrf
        @method('delete')
        <div class="grid gap-2">
            <x-ui.control.label for="delete_account_password">Enter your password to confirm you would like to delete your account.</x-ui.control.label>
            <x-ui.control.input placeholder="Enter password" name="delete_account_password" type="password" id="delete_account_password"
                                autocomplete="off"
                                required
                                class="border-red-500"
            />
            <x-ui.control.validation-error name="delete_account_password"/>
        </div>

        <x-ui.control.button size="lg" status="danger" class="me-auto">
            <span class="text-sm">
                Delete account
            </span>
        </x-ui.control.button>
    </form>

</div>
