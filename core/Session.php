<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/***
 * Class Session; checks the sessions
 */
class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (array_key_exists($key, $_SESSION)):
            return $_SESSION[$key];
        else:
            return null;
        endif;
    }

    public static function has($key)
    {
        if (array_key_exists($key, $_SESSION)):
            return true;
        else:
            return false;
        endif;
    }

    public static function flash($key, $value)
    {
        $_SESSION['flash'][$key] = $value;
    }

    public static function getFlash($key)
    {
        if (array_key_exists('flash', $_SESSION)) {
            if (array_key_exists($key, $_SESSION['flash'])):
                return $_SESSION['flash'][$key];
            else:
                return null;
            endif;
        }
        return null;
    }

    public static function clearFlash()
    {
        $_SESSION['flash'] = [];
    }
}
