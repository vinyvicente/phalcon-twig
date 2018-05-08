<?php

use Phalcon\Mvc\View\Engine\Twig;

class TwigTest extends \PHPUnit\Framework\TestCase
{
    public function testInstance()
    {
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('app/views/');
        $view->registerEngines([
            Twig::DEFAULT_EXTENSION => function ($view, $di) {
                $twig = new Twig($view, $di, [
                    'cache' => __DIR__ . '/app/cache/',
                ]);

                // customize as you want
                // $twig->getEnvironment()->addExtension('');

                return $twig;
            }
        ]);
    }
}
