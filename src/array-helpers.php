<?php

namespace ArrayHelpers;

function array_get($array, $key, $default = null)
{
    return Arr::get($array, $key, $default);
}
