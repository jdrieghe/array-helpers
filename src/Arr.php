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

        $keys = explode('.', $key);
        while (count($keys) > 0) {
            $shiftedKey = array_shift($keys);
            if (!array_key_exists($shiftedKey, $array)) {
                return $default;
            }
            return static::get($array[$shiftedKey], join('.', $keys), $default);
        }

        return $default;
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

        $keys = explode('.', $key);
        while (count($keys) > 0) {
            $shiftedKey = array_shift($keys);
            if (!array_key_exists($shiftedKey, $array)) {
                return false;
            }
            return static::has($array[$shiftedKey], join('.', $keys));
        }

        return false;
    }
}
