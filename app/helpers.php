<?php

declare(strict_types=1);

function siteTitle(string $input): string
{
    $appName = config('app.name');

    if ($input === $appName) {
        return $input;
    }

    return sprintf('%s // %s', $input, $appName);
}
