<?php

namespace GHBJayce\Weapon;

class Arr
{
    /**
     * 按照指定key或函数对数组进行分组
     *
     * @param array $array
     * @param string|int|callable $key_or_func
     * @return array
     */
    public static function group(array $array, $key_or_func)
    {
        $return = [];

        foreach ($array as $item) {
            if (is_callable($key_or_func)) {
                $return[call_user_func($key_or_func, $item)][] = $item;
            } elseif (is_object($item)) {
                $return[$item->{$key_or_func}][] = $item;
            } elseif (isset($item[$key_or_func])) {
                $return[$item[$key_or_func]][] = $item;
            }
        }

        return $return;
    }

    /**
     * 转换成一维数组
     *
     * @param array $array
     * @param string|int $key
     * @return array
     */
    public static function toOneDimension(array $array, $key)
    {
        $return = [];

        foreach ($array as $v) {
            isset($v[$key]) && $return[] = $v[$key];
        }

        return $return;
    }
}