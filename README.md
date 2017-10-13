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

If you prefer a more functional approach, add `vendor/jdrieghe/array-helpers/src/array-helpers.php` to your 
autoload files in composer.

```
use function ArrayHelpers\array_get;

$result = array_get($array, $key, $default);
```

