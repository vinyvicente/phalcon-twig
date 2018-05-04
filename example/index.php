<?php

error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Loader;

try {
    $loader = new Loader();
    $loader->registerDirs([
        __DIR__ . '/app/controllers/',
    ]);
    $loader->register();

    $di = new \Phalcon\Di\FactoryDefault();

    $di['view'] = function () {
        $view = new View();
        $view->setViewsDir('app/views/');
        $view->registerEngines([
            View\Engine\Twig::DEFAULT_EXTENSION => function ($view, $di) {
				
				$loader = new \Twig_Loader_Filesystem($view->getViewsDir());
				$environment = new \Twig_Environment($loader, [
					'cache' => __DIR__ . '/app/cache/'
				]);

				// Add extensions, filter, functions and more here!
                // $environment->addExtension(...);
                // $environment->addFilter(...);
				// $environment->addFunction(...);

				return new \Phalcon\Mvc\View\Engine\Twig($view, $di, $environment);

            }
        ]);

        return $view;
    };

    $app = new Application($di);
    echo $app->handle()->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
