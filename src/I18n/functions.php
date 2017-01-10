<?php

use Aml\I18n\I18n\I18n;

if (!function_exists('__t')) {
    
    /**
     * __() wrapper
     *
     * @param string $singular Text to translate.
     * @param mixed $args Array with arguments or multiple arguments in function.
     * @return mixed Translated string.
     * @link http://book.cakephp.org/3.0/en/core-libraries/global-constants-and-functions.html#__
     */
    function __t($singular, $args = null)
    {
        return __d(I18n::domain(), $singular, $args);
    }

}