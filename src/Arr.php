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

    /**
     * Set an array item to a given value using "dot" notation.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $value
     * @return array
     */
    public static function set(&$array, $key, $value)
    {
        $keys = explode('.', $key);

        while (count($keys) > 1) {
            $key = array_shift($keys);

            // If the key doesn't exist at this depth, we will just create an empty array
            // to hold the next value, allowing us to create the arrays to hold final
            // values at the correct depth. Then we'll keep digging into the array.
            if (! isset($array[$key]) || ! is_array($array[$key])) {
                $array[$key] = [];
            }

            $array = &$array[$key];
        }

        $array[array_shift($keys)] = $value;

        return $array;
    }
}
