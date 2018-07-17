[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jdrieghe/array-helpers/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jdrieghe/array-helpers/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/jdrieghe/array-helpers/badges/build.png?b=master)](https://scrutinizer-ci.com/g/jdrieghe/array-helpers/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/jdrieghe/array-helpers/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/jdrieghe/array-helpers/?branch=master)
[![CircleCI](https://circleci.com/gh/jdrieghe/array-helpers/tree/master.svg?style=shield)](https://circleci.com/gh/jdrieghe/array-helpers/tree/master)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://github.com/jdrieghe/array-helpers/blob/master/LICENSE)

## Purpose

This package was inspired by some of the great array helper functions in Laravel.

Having to include all of `Illuminate\Support` is sometimes a bit too much for a given project, so I decided to build
a separate package to provide some much needed framework independent array magic.

## Installation

Installation can be done easily through composer.

```
composer require jdrieghe\array-helpers
```

## Usage

### Static approach

You can choose to use only the static helper methods.

```
use ArrayHelpers\Arr;

$result = Arr::get($array, $key, $default);
```

### Functional approach

If you prefer a more functional approach, some namespaced convenience methods are available as well:

```
use function ArrayHelpers\array_get;

$result = array_get($array, $key, $default);
```

### Available helpers

#### Array Get

This helper allows you to get an item from an array using dot notation.
If the item is not found, it will return a given default or null.

```
$data = [
    'foo' => [
        'bar' => 'baz',
    ],
];

Arr::get($data, 'foo');
// returns: ['bar' => 'baz'];
 
Arr::get($data, 'foo.bar'); 
// returns: 'baz';

Arr::get($data, 'xyz', 'default');
// returns: 'default';
```

Note that `Arr::get()` can be replaced with `array_get()` if you prefer a functional approach.

#### Array Has

This helper checks if an item exists in an array using dot notation.

```
$data = [
    'foo' => [
        'bar' => 'baz',
    ],
];

Arr::has($data, 'foo');
// returns: true;
 
Arr::has($data, 'foo.bar'); 
// returns: true;

Arr::has($data, 'xyz');
// returns: false;
```

Note that `Arr::has()` can be replaced with `array_has()` if you prefer a functional approach.

#### Array Set

This helper sets a certain key in an array to a certain value.
Dot notation can be used to create a deeply nested key.

```
$data = [];
Arr::set($data, 'foo.bar', 'baz');
```

`$data` now contains:
```
[
    'foo' => [
        'bar' => 'baz',
    ],
]; 
```

Note that `Arr::set()` can be replaced with `array_set()` if you prefer a functional approach.

