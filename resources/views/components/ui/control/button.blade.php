@php
    use Illuminate\View\ComponentAttributeBag;
    $tag = is_null($href ?? null) ? 'button' : 'a';

$colors = match($status) {
    'info' => 'bg-blue-600 text-white hover:bg-blue-600/90 ring-blue-600/50',
    'success' => 'bg-green-600 text-white hover:bg-green-600/90 ring-green-600/50',
    'danger' => 'bg-red-600 text-white hover:bg-red-600/90 ring-red-600/50',
    'warning' => 'bg-orange-600 text-white hover:bg-orange-600/90 ring-orange-600/50',
    'raw' => '',
    default => 'bg-foreground text-background hover:bg-foreground/90 ring-foreground/90',
};

$spacing = match($size) {
    'xs' => 'rounded-sm shadow-xs text-xs px-[0.675em] py-[0.375em]',
    'sm' => 'rounded-sm shadow-sm text-sm  px-[0.675em] py-[0.375em]',
    'lg' => 'rounded shadow-md text-lg px-[0.675em] py-[0.375em]',
    'raw' => '',
    default => 'rounded shadow-xs text-md px-[0.675em] py-[0.375em]',
};

$class = ($status === 'raw' && $size === 'raw') ? [] : [
    'inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-[color,box-shadow,background]',
    '[&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[0.2em]',
    'disabled:pointer-events-none disabled:opacity-50 leading-none',
    'cursor-pointer',
    $colors, $spacing,
];
@endphp
<{{$tag}} {{$attributes->when($href??false, fn(ComponentAttributeBag $a) => $a->merge(['href' => $href]))->class($class)}}>{{$label ?? $slot}}</{{$tag}}>
