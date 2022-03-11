<?php

use Aml\I18n\I18n\I18n;

if (!function_exists('__t')) {
    /**
     * Returns a translated string if one is found using the automatic domain; Otherwise, the submitted message.
     *
     * @param string $msg String to translate.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__d
     */
    function __t(string $msg, ...$args): string
    {
        $arguments = array_merge([I18n::domain()], func_get_args());
        return call_user_func_array('__d', $arguments);
    }
}

if (!function_exists('__tn')) {
    /**
     * Returns correct plural form of message identified by $singular and $plural for count $count
     * from automatic domain.
     *
     * @param string $singular Singular string to translate.
     * @param string $plural Plural.
     * @param int $count Count.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Plural form of translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__dn
     */
    function __tn(string $singular, string $plural, int $count, ...$args): string
    {
        $arguments = array_merge([I18n::domain()], func_get_args());
        return call_user_func_array('__dn', $arguments);
    }
}

if (!function_exists('__tx')) {
    /**
     * Allows you to override the current domain for a single message lookup.
     * The context is a unique identifier for the translations string that makes it unique
     * within the same domain. Using automatic domain
     *
     * @param string $context Context of the text.
     * @param string $msg String to translate.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__dx
     */
    function __tx(string $context, string $msg, ...$args): string
    {
        $arguments = array_merge([I18n::domain()], func_get_args());
        return call_user_func_array('__dx', $arguments);
    }
}

if (!function_exists('__txn')) {
    /**
     * Returns correct plural form of message identified by $singular and $plural for count $count.
     * Using the automatic domain.
     * The context is a unique identifier for the translations string that makes it unique
     * within the same domain.
     *
     * @param string $context Context of the text.
     * @param string $singular Singular text to translate.
     * @param string $plural Plural text.
     * @param int $count Count.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Plural form of translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__dxn
     */
    function __txn(string $context, string $singular, string $plural, int $count, ...$args): string
    {
        $arguments = array_merge([I18n::domain()], func_get_args());
        return call_user_func_array('__dxn', $arguments);
    }
}
