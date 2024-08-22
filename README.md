# I18n plugin for CakePHP

Allows setting a default domain for translations.

Before:
```php
__('members'); // outputs members
__d('hospitals', 'members'); // outputs patients
```

```php
__n('Record', 'Records', 2); // outputs Record or Records
__dn('hospitals', 'Record', 'Records', 2); // outputs Visit or Visits
```

```php
__x('written communication', 'He read the first letter'); // Adds additional context for use during translation
__dx('hospitals', 'eye chart viewing', 'He read the first letter'); // Adds additional context for use during translation
```

```php
__xn('character', 'Spy', 'Spies', 2); // Adds additional context for use during translation
__dxn('hospitals', 'to see', 'Spy', 'Spies', 2); // Adds additional context for use during translation
```

With plugin:
```php
use Aml\I18n\I18n;

__('members');                      // outputs members
__t('members');                     // outputs members
__n('Record', 'Records', 2);        // outputs Records
__tn('Record', 'Records', 1);       // outputs Record

I18n::domain('hospitals');
__('members');                      // still outputs members
__t('members');                     // outputs patients
__n('Record', 'Records', 2);        // outputs Visits
__tn('Record', 'Records', 1);       // outputs Visit
```

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

```
composer require andres-ml/cakephp-i18n
```

## Usage

Automatically load the plugin by running `bin/cake plugin load Aml/I18n`

Manually load the plugin in `src/Application.php` `bootstrap()` function by adding the following line
```php
$this->addPlugin('Aml/I18n');
```

Wherever you would use [`__()`](https://book.cakephp.org/4.0/en/core-libraries/global-constants-and-functions.html#__),
you can now use `__t()`.

Wherever you would use [`__n()`](https://book.cakephp.org/4.0/en/core-libraries/global-constants-and-functions.html#__n),
you can now use `__tn()`.

Wherever you would use [`__x()`](https://book.cakephp.org/4.0/en/core-libraries/global-constants-and-functions.html#__x),
you can now use `__tx()`.

Wherever you would use [`__xn()`](https://book.cakephp.org/4.0/en/core-libraries/global-constants-and-functions.html#__xn),
you can now use `__txn()`.

Remember to create a _domain_.po file next to each default.po file for each domain you want to support. ([https://book.cakephp.org/4.0/en/core-libraries/internationalization-and-localization.html#language-files](https://book.cakephp.org/4.0/en/core-libraries/internationalization-and-localization.html#language-files))

To automatically generate the default.pot base file:
```
bin/cake aml/I18n.i18n extract
```
