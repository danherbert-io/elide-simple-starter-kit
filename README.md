# Laravel + Elide starter kit.

## Getting started

```shell
laravel new --using=danherbert-io/elide-simple-starter-kit
```

## Quick rundown

This starter kit is a fresh Laravel 12 project + Elide, with some initial templates and routes to get things moving quickly.

It is configured to use Elide/HTMX, Tailwind, and TypeScript.

With regard to HTMX, it also loads the Idiomorph extension in the root application view to support DOM morphing, should you desire.

Pages/routes/controllers include:

- Home page
- Guest pages:
  - Log in
  - Register
  - Reset password
- Profile settings page:
  - Profile form
  - Reset password form
  - Delete account form

## Models

This kit includes the default `User` model and migrations of a fresh Laravel project.

It also includes an abstract `App\Models\Model` class which can automatically provide a `->uuid` property for new models if a model implements the `App\Contracts\HasModelUuid` interface.

There is also a `App\Contracts\HasCommonModelProperties` interface which declares common model properties (id+timestamps) via the DocBlock. Useful for IDEs.

## Views/Components

The kit contains a number of components with corresponding Blade template files.

- `App\View\Components\Page\**` - All the pages of the kit
- `App\View\Components\Form\**` - All the forms of the kit
- `App\View\Components\Ui\**` - Various UI components making up the kit, eg:
  - `LoadingIndicator`
  - `SiteFooter` and `SiteHeader`
  - `ToastNotification`
  - A small set of controls under `App\View\Components\Ui\Control`
- `App\View\Components\Todo` - A simple "@TODO" style component for use when building out UIs.

## Email notifications

It includes a "welcome" email notification for new accounts, and a "profile deleted" email notification for when users delete their accounts.

## Toast notifications

The `AppServiceProvider` and root application view also boots support for sending toast notifications to the frontend. 

This can be done like this:

```php
Route::get('make-success-notification', function() {
    return redirect(...)
        ->with('toast-success', 'This was a success!');
});
```

Supported toast types are:

- `toast-notification`
- `toast-info`
- `toast-success`
- `toast-warning`
- `toast-danger`

PS - in the spirit of "no build", these toast notifications are self-contained DOM components. You can learn more about them and customise them by looking at:

- `App\View\Components\Ui\ToastNotification`
- `resources/views/components/ui/toast-notification.blade.php`


## Composer

There is a `composer reset-db` command defined, which will wipe the database, run migrations, and run the seeder.



## Tests

This kit includes a range of baseline tests similar to the Laravel React Starter Kit.
