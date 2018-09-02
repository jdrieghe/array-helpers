<?php

namespace ArrayHelpers;

function array_get(array $array, string $key, $default = null)
{
    return Arr::get($array, $key, $default);
}

function array_has(array $array, string $key): bool
{
    return Arr::has($array, $key);
}

function array_set(array &$array, string $key, $value): array
{
    return Arr::set($array, $key, $value);
}
