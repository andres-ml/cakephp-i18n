<?php

use Aml\I18n\I18n\I18n;

if (!function_exists('__t')) {
    
    /**
     * __d() wrapper with automatic domain
     *
     * @return mixed Translated string.
     * @link http://book.cakephp.org/3.0/en/core-libraries/global-constants-and-functions.html#__
     */
    function __t()
    {
        $arguments = array_merge([I18n::domain()], func_get_args());
        return call_user_func_array('__d', $arguments);
    }

}