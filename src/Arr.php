<?php

namespace ArrayHelpers;

class Arr
{
    /**
     * @param array $array
     * @param string $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public static function get(array $array, $key, $default = null)
    {
        if (!array_key_exists($key, $array)) {
            return $default;
        }

        return $array[$key];
    }
}
