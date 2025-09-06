<?php

namespace App\Enums;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

enum Disk: string
{
    case LOCAL = 'local';
    case PUBLIC = 'public';
    case S3 = 's3';

    public function disk(): Filesystem
    {
        return Storage::disk($this->value);
    }
}
