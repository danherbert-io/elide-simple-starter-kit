<!doctype html>
<html lang="en" class="h-full bg-background text-foreground">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <title>{{$title ?? config('app.name')}}</title>
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.6/dist/htmx.min.js" defer
            integrity="sha384-Akqfrbj/HpNVo8k11SXBb6TlBWmXXlYQrCSqEWmyKJe+hDm3Z/B2WVG4smwBkRVm"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/idiomorph@0.7.3" defer
            integrity="sha384-JcorokHTL/m+D6ZHe2+yFVQopVwZ+91GxAPDyEZ6/A/OEPGEx1+MeNSe2OGvoRS9"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/idiomorph@0.7.3/dist/idiomorph-ext.min.js" defer
            integrity="sha384-szktAZju9fwY15dZ6D2FKFN4eZoltuXiHStNDJWK9+FARrxJtquql828JzikODob"
            crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>
<body class="relative min-h-full font-sans text-neutral-700 bg-neutral-50 text-balance"
      hx-headers="{{json_encode(['X-CSRF-TOKEN' => csrf_token()])}}"
      hx-indicator="#loading-indicator"
      hx-ext="morph"
>
<x-ui.loading-indicator/>

<div class="max-w-5xl m-auto p-6 pt-2 flex flex-col gap-2 min-h-screen  justify-start items-stretch">
    <x-ui.site-header/>

    <hr class="border-current/20 mb-4">

    <main class="flex-grow relative flex flex-col">@htmxPartial('content')</main>

    <x-ui.toast-notifications/>
    <x-ui.site-footer/>
</div>

</body>
</html>
