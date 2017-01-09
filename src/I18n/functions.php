<?php

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
        if (!$singular) {
            return;
        }
        
        $arguments = func_num_args() === 2 ? (array) $args : array_slice(func_get_args(), 1);
        return I18n::translator()->translate($singular, $arguments);
    }

}