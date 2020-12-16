# Favoritable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tobischulz/laravel-favoritable.svg?style=flat-square)](https://packagist.org/packages/tobischulz/laravel-favoritable)
[![Total Downloads](https://img.shields.io/packagist/dt/tobischulz/laravel-favoritable.svg?style=flat-square)](https://packagist.org/packages/tobischulz/laravel-favoritable)

Adds an easy way to make every model favoritable.

## Installation

You can install the package via composer:

```bash
composer require tobischulz/laravel-favoritable
```

Publish all required assets:

```bash
php artisan vendor:publish --provider=TobiSchulz\Favoritable\FavoritableServiceProvider
```

Migrate your database:

```bash
php artisan migrate
```

## Preparation

Add trait to eloquent model that you like to be favoritable.

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TobiSchulz\Favoritable\Traits\Favoriteable;

class Post extends Model
{
    use Favoriteable;

    // ...
}
```

Add trait your user model that will have favorites.

```php
<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use TobiSchulz\Favoritable\Traits\HasFavorites;

class User extends Authenticatable
{
    use HasFavorites;

    // ...
}
```

## Usage

```php
<?php

/**
 * API for Favoritable
 */
$post = Post::find(1);

$post->addFavorite();   // adds this post to favorites to current user
$post->removeFavorite();    // remove this post from favorites
$post->toggleFavorite();    // toggle this post as favorite
$post->isFavorited();   // returns boolean for this post favorite state


$post = Post::find(1);
$user = User::find(2);

$post->addFavorite($user);  // adds favorite for this post and a specific user.

/**
 * API for HasFavorites
 */
$user = User::find(1);

$user->favorites(Post::class);  // returns collection of Post::class favorites

```

### Testing

wip

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email tobias@byte.software instead of using the issue tracker.

## Credits

- [Tobias Schulz](https://github.com/:tobischulz)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
