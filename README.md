# phalcon-twig

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