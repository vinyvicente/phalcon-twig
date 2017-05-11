# phalcon-twig

[![Latest Stable Version](https://poser.pugx.org/vinyvicente/phalcon-twig/v/stable)](https://packagist.org/packages/vinyvicente/phalcon-twig)
[![Total Downloads](https://poser.pugx.org/vinyvicente/phalcon-twig/downloads)](https://packagist.org/packages/vinyvicente/phalcon-twig)
[![License](https://poser.pugx.org/vinyvicente/phalcon-twig/license)](https://packagist.org/packages/vinyvicente/phalcon-twig)
[![Monthly Downloads](https://poser.pugx.org/vinyvicente/phalcon-twig/d/monthly)](https://packagist.org/packages/vinyvicente/phalcon-twig)
[![Daily Downloads](https://poser.pugx.org/vinyvicente/phalcon-twig/d/daily)](https://packagist.org/packages/vinyvicente/phalcon-twig)
[![composer.lock](https://poser.pugx.org/vinyvicente/phalcon-twig/composerlock)](https://packagist.org/packages/vinyvicente/phalcon-twig)

## Requirements

    PHP >= 5.6
    Phalcon >= 3.x

## Install

```
composer require vinyvicente/phalcon-twig
```

### Configuration

* Register in your DI configuration view, registering new view engine.

```php

    $di = new \Phalcon\Di\FactoryDefault();

    $di['view'] = function () {
        $view = new View();
        $view->setViewsDir('app/views/');
        $view->registerEngines([
            View\Engine\Twig::DEFAULT_EXTENSION => function ($view, $di) {
                return new View\Engine\Twig($view, $di, [
                    'cache' => __DIR__ . '/app/cache/',
                ]);
            }
        ]);

        return $view;
    };

```

### Important

    See Twig Docs: http://twig.sensiolabs.org/documentation

Enjoy!