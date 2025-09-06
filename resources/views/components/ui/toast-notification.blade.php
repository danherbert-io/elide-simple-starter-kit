@php
$statusClass = match($status ?? null) {
    'danger' => 'font-bold bg-red-100 outline-red-500/80',
    'warning' => 'font-bold bg-orange-100 outline-orange-500/80',
    'success' => 'font-bold bg-green-100 outline-green-500/80',
    'info' => 'bg-sky-100 outline-sky-500/80',
    default => 'outline-current/30 bg-white/95',
};
@endphp
<div @class([
    'outline drop-shadow-sm drop-shadow-black/30 px-2 py-1 text-sm rounded backdrop-blur-lg',
    'opacity-0 transition-all delay-100 duration-500 ease-in-out',
    $statusClass
]) id="{{$id}}">
    {{$message ?? '??'}}

    <script>
        (function () {
            const $toast = document.querySelector('#{{$id}}');

            if (!$toast) {
                return;
            }

            requestAnimationFrame(() => {
                $toast.classList.remove('opacity-0');

                window.setTimeout(() => {
                    $toast.classList.add('opacity-0');

                    window.setTimeout(() => {
                        $toast.parentElement.remove();
                    }, 501);
                }, {{$lifespan}});
            })
        })();
    </script>

</div>
