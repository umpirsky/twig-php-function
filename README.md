# Twig PHP Function [![Build Status](https://travis-ci.org/umpirsky/twig-php-function.svg?branch=master)](https://travis-ci.org/umpirsky/twig-php-function)

Call (almost) any PHP function from your Twig templates.

## Usage

After [registering](http://twig.sensiolabs.org/doc/advanced.html#creating-an-extension) `PhpFunctionExtension` call PHP functions from your templates like this:

```twig
Hi, I am unique: {{ php_uniqid() }}.

And {{ php_floor(7.7) }} is floor of 7.7.
```

As you can see, just prefix PHP function with `php_` prefix and that's it.

## Extend

You can control allowed PHP functions by adding new ones like this:

```php
$extension = new Umpirsky\Twig\Extension\PhpFunctionExtension();
$extension->allowFunction('hash_hmac');

```

or restrict what functions are allowed like this:

```php
$extension = new Umpirsky\Twig\Extension\PhpFunctionExtension(['floor', 'ceil']);

```

If you think that some function should be allowed/not allowed, feel free to [raise issue](https://github.com/umpirsky/twig-php-function/issues/new) or submit a pull request.
