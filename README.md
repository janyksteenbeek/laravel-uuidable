# Laravel UUIDable

Adding the ability to use UUIDs as identifiers on models in Laravel

## Installation

You can install the package using Composer:

```bash
composer require janyksteenbeek/laravel-uuidable
```

## Usage

Apply the trait supplied by this package to the model that needs a UUID as primary identifier.

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Janyk\LaravelUuidable\Uuidable;

class Post extends Model
{
    use Uuidable, HasFactory;
    // ...
```

### Migrations
Note that you have to change your database migrations when using UUIDs. The identifying field needs to be a `uuid` field like in the following example:

```php
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
    // ...
```

## License

This package is open-source licensed under the MIT license set out in the [LICENSE](LICENSE) file

## Security Vulnerabilities

This packages adheres the Responsible Disclosure guidelines set out by Webmethod regarding security vulnerabilities. You can find the policy [here](https://www.webmethod.nl/juridisch/responsible-disclosure).
