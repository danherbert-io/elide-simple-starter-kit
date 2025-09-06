@php
    $linkClass = '';
@endphp
<ul hx-boost="true" class="flex-grow flex justify-end items-center gap-4 capitalize lg:normal-case">
    @auth
        <li class="me-auto hidden md:grid">
            <strong>Hi, {{auth()->user()->name}}</strong>
        </li>
        @if(!auth()->user()->hasVerifiedEmail())
            <strong class="normal-case text-blue-700">
                Your account needs verification.
            </strong>
        @endif
        <li><a @class([
            $linkClass,
            Route::is('profile.edit') ? 'font-bold' : '',
        ]) href="{{route('profile.edit')}}">Settings</a></li>
        <li><a @class([
            $linkClass,
            Route::is('logout') ? 'font-bold' : '',
        ]) href="{{route('logout')}}">Sign out</a></li>
    @endauth
    @guest
        <li class="me-auto hidden md:block font-bold">{{config('app.name')}}</li>
        <li><a @class([
            $linkClass,
            Route::is('login') ? 'font-bold' : '',
        ]) href="{{route('login')}}">Log in</a></li>
    @endguest
</ul>
