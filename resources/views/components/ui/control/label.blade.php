<label {{$attributes->class([
        'text-sm font-bold leading-none select-none group-data-[disabled=true]:pointer-events-none',
        'group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50',
])}}>
    {{$slot}}
</label>
