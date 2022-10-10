<?php

/**
 * @author Eko Triono <saya@echo.web.id>
 */

namespace Helpers;

class Util
{
    /**
     * Validate a given email address
     * @param string $email
     * @return bool
     * related global function is_email($email)
     */
    public static function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false ? true : false;
    }

    /**
     * Dump & Die
     * @param mixed $var
     */
    public static function dd($var)
    {
        if (is_bool($var)) {
            $var = 'bool(' . var_export($var, true) . ')';
        }

        if (php_sapi_name() === 'cli') {
            print_r($var);
        } else {
            highlight_string("<?php\n" . var_export($var, true));
        }
        die();
    }
}