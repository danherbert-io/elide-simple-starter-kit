@error($name)
<div {{$attributes->class([
'text-sm text-red-600 dark:text-red-400',
])}}>{{ $message }}</div>
@enderror
