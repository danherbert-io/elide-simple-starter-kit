<div class="contents">
    <x-form.auth.login-form
        :canResetPassword="Route::has('password.request')"
        :status="request()->session()->get('status')"
    />
</div>
