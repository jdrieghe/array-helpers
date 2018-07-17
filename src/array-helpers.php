<?php

namespace ArrayHelpers;

function array_get($array, $key, $default = null)
{
    return Arr::get($array, $key, $default);
}

function array_has($array, $key)
{
    return Arr::has($array, $key);
}

function array_set(&$array, $key, $value)
{
    return Arr::set($array, $key, $value);
}
