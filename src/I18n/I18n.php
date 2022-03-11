<?php
namespace Aml\I18n\I18n;

use Cake\I18n\I18n as CakeI18n;

/**
 * Extend CakePHP's I18n to allow definition of default domains
 * 
 * It's not possible to change default domain via CakePHP's I18n classes
 * since you need to either specify domain at translation time ('__d()' function)
 * or the translations are cached and you can't change them on the fly.
 * 
 */
class I18n extends CakeI18n {
    
    /**
     * Default domain/name.
     * 
     * @var string
     */
    protected static $_domain = 'default';
    
    /**
     * Gets/sets default domain/name.
     * 
     * @param string $domain
     * @return string|void
     */
    public static function domain(string $domain = null)
    {
        if ($domain !== null) {
            self::$_domain = $domain;

            return;
        }
        
        return self::$_domain;
    }
}
