<?php

use App\View\Components\Page\Home;
use Elide\Htmx;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => Htmx::render(Home::class)->title(config('app.name')))->name('welcome');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
