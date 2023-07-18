# Laravel Hash Fields

> **Warning**
> We have decided to stop maintaining this package.
>
> Consider to use [Attribute Casting](https://laravel.com/docs/10.x/eloquent-mutators#attribute-casting) of type `hashed`.

[![Latest Stable Version](https://poser.pugx.org/datalogix/laravel-hash-fields/version)](https://packagist.org/packages/datalogix/laravel-hash-fields)
[![Total Downloads](https://poser.pugx.org/datalogix/laravel-hash-fields/downloads)](https://packagist.org/packages/datalogix/laravel-hash-fields)
[![tests](https://github.com/datalogix/laravel-hash-fields/workflows/tests/badge.svg)](https://github.com/datalogix/laravel-hash-fields/actions)
[![StyleCI](https://github.styleci.io/repos/419068746/shield?style=flat)](https://github.styleci.io/repos/419068746)
[![codecov](https://codecov.io/gh/datalogix/laravel-hash-fields/branch/main/graph/badge.svg)](https://codecov.io/gh/datalogix/laravel-hash-fields)
[![License](https://poser.pugx.org/datalogix/laravel-hash-fields/license)](https://packagist.org/packages/datalogix/laravel-hash-fields)

> Laravel Hash Fields automatically hash ​model fields.

## Installation

You can install the package via composer:

```bash
composer require datalogix/laravel-hash-fields
```

The package will automatically register itself.

## Usage

Your Eloquent models should use the `Datalogix\HashFields\HashFields` trait.

Here's an example of how to implement the trait:

```php
namespace App;

use Datalogix\HashFields\HashFields;
use Illuminate\Database\Eloquent\Model;

class YourEloquentModel extends Model
{
    use HashFields;
}
```

## Customizing fields to hash

You can also override of property `fieldsToHash`.

By default the package will hashed `password` field.

```php
/**
 * The model's fields to hash.
 *
 * @var array
 */
protected static $fieldsToHash = [
    'password',
];
```
