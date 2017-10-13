<?php

namespace ArrayHelpers;

class Arr
{
    /**
     * Get an item from an array.
     * Supports dot notation:
     * e.g `Arr::get($array, 'section.subsection.item')`
     *
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

        foreach (explode('.', $key) as $segment) {
            if (is_array($array) && array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }

        return $array;
    }

    /**
     * Checks if an item is available in an array.
     * Supports dot notation:
     * e.g `Arr::has($array, 'section.subsection.item')`
     *
     * @param array $array
     * @param string $key
     * @return bool
     */
    public static function has(array $array, $key)
    {
        if (array_key_exists($key, $array)) {
            return true;
        }

        if (strpos($key, '.') === false) {
            return false;
        }

        foreach (explode('.', $key) as $segment) {
            if (is_array($array) && array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return false;
            }
        }

        return true;
    }
}
