<?php

namespace Helpers;

class Str
{
    /**
     * str_insert
     * @param array  $keyValue
     * @param string $string
     * @return string
     */
    public static function insert($keyValue, $string)
    {
        if (is_assoc($keyValue)) {
            foreach ($keyValue as $search => $replace) {
                $string = str_replace($search, $replace, $string);
            }
        }

        return $string;
    }

    /**
     * str_between
     * @param string $left
     * @param string $right
     * @param string $string
     * @return array
     */
    public static function between($left, $right, $string)
    {
        preg_match_all('/' . preg_quote($left, '/') . '(.*?)' . preg_quote($right, '/') . '/s', $string, $matches);
        return array_map('trim', $matches[1]);
    }

    /**
     * str_after
     * @param string $search
     * @param string $string
     * @return string
     */
    public static function after($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string, 2))[0]);
    }

    /**
     * before
     * @param string $search
     * @param string $string
     * @return string
     */
    public static function before($search, $string)
    {
        return $search === '' ? $string : rtrim(explode($search, $string)[0]);
    }

    /**
     * str_limit_words
     * @param  string $string
     * @param  int    $limit
     * @param  string $end
     * @return string
     */
    public static function limitWords($string, $limit = 10, $end = '...')
    {
        $arrayWords = explode(' ', $string);

        if (sizeof($arrayWords) <= $limit) {
            return $string;
        }

        return implode(' ', array_slice($arrayWords, 0, $limit)) . $end;
    }

    /**
     * str_limit
     * @param  string $string
     * @param  int    $limit
     * @param  string $end
     * @return string
     */
    public static function limit($string, $limit = 100, $end = '...')
    {
        if (mb_strwidth($string, 'UTF-8') <= $limit) {
            return $string;
        }

        return rtrim(mb_strimwidth($string, 0, $limit, '', 'UTF-8')) . $end;
    }

    /**
     * str_contains
     * @param string|array $needle
     * @param string       $haystack
     * @return bool
     */
    public static function contains($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if (strpos($haystack, $ndl) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * str_icontains
     * @param string|array $needle
     * @param string       $haystack
     * @return bool
     */
    public static function containsIgnoreCase($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if (stripos($haystack, $ndl) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * str_starts_with
     * @param string|array $needle
     * @param string       $haystack
     * @return bool
     */
    public static function startsWith($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if ($ndl !== '' && substr($haystack, 0, strlen($ndl)) === (string)$ndl) {
                return true;
            }
        }

        return false;
    }

    /**
     * str_istarts_with
     * @param string|array $needle
     * @param string       $haystack
     * @return bool
     */
    public static function startsWithIgnoreCase($needle, $haystack)
    {
        $hs = strtolower($haystack);

        foreach ((array)$needle as $ndl) {
            $n = strtolower($ndl);
            if ($n !== '' && substr($hs, 0, strlen($n)) === (string)$n) {
                return true;
            }
        }

        return false;
    }

    /**
     * str_ends_with
     * @param string|array $needle
     * @param string       $haystack
     * @return bool
     */
    public static function endsWith($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            $length = strlen($ndl);
            if ($length === 0 || (substr($haystack, -$length) === (string)$ndl)) {
                return true;
            }
        }

        return false;
    }

    /**
     * str_iends_with
     * @param string|array $needle
     * @param string       $haystack
     * @return bool
     */
    public static function endsWithIgnoreCase($needle, $haystack)
    {
        $hs = strtolower($haystack);

        foreach ((array)$needle as $ndl) {
            $n = strtolower($ndl);
            $length = strlen($ndl);
            if ($length === 0 || (substr($hs, -$length) === (string)$n)) {
                return true;
            }
        }

        return false;
    }

    /**
     * str_after_last
     * @param string $search
     * @param string $string
     * @return string
     */
    public static function afterLast($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string))[0]);
    }
}