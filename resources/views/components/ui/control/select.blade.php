<select {{$attributes->class([
        'bg-background border-input file:text-foreground placeholder:text-muted-foreground flex h-9 rounded-md border px-3 py-1 shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50',
        'focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]',
        'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive',
])}}>
    @if($placeholder !== null)
        <option value="">{{$placeholder}}</option>
    @endif
    @foreach($choices as $choiceValueOrGroupLabel => $labelOrGroupOptions)
        @if(is_array($labelOrGroupOptions))
            <optgroup label="{{$choiceValueOrGroupLabel}}">
                @foreach($labelOrGroupOptions as $groupOptionValue => $groupOptionLabel)
                    <option value="{{$groupOptionValue}}"
                    @foreach($choiceAttributes[$groupOptionValue] ?? [] as $attribute => $attributeValue)
                        {{$attribute}}="{{$attributeValue}}"
                    @endforeach
                    @if($groupOptionValue === $value)
                        selected
                    @endif
                    >{{$groupOptionLabel}}</option>
                @endforeach
            </optgroup>
        @else
            <option value="{{$choiceValueOrGroupLabel}}"
            @foreach($choiceAttributes[$choiceValueOrGroupLabel] ?? [] as $attribute => $attributeValue)
                {{$attribute}}="{{$attributeValue}}"
            @endforeach
            @if($choiceValueOrGroupLabel === $value)
                selected
            @endif
            >{{$labelOrGroupOptions}}</option>
        @endif
    @endforeach
</select>
