# I18n plugin for CakePHP

Allows setting a default domain for translations.

Before:
```php
__('members');                      // outputs members
__d('hospitals', 'members');        // outputs patients
```

With plugin:
```php
use Aml\I18n\I18n;

__('members');                      // outputs members
__t('members');                     // outputs members

I18n::domain('hospitals');
__('members');                      // still outputs members
__t('members');                     // outputs patients
```

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

```
composer require andres-ml/cakephp-i18n
```

## Usage

Load the plugin in `bootstrap.php`:
```php
Plugin::load('Aml/I18n');
```

Wherever you would use [`__()`](https://book.cakephp.org/3.0/en/core-libraries/global-constants-and-functions.html#__),
you can now use `__t()`.

Remember to create a _domain_.po file next to each default.po file for each domain you want to support. ([https://book.cakephp.org/3.0/en/core-libraries/internationalization-and-localization.html#language-files](https://book.cakephp.org/3.0/en/core-libraries/internationalization-and-localization.html#language-files)
