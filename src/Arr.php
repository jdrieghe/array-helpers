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
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return $default;
        }

        $keys = explode('.', $key);
        while(count($keys) > 0) {
            $subSet = $array[array_shift($keys)];
            if (is_array($subSet)) {
                return static::get($subSet, join('.', $keys), $default);
            }
        }

        return $default;
    }
}
