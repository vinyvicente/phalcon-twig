<?php

namespace Phalcon\Mvc\View\Engine;

use Phalcon\Mvc\View\Engine;
use Phalcon\Mvc\View\EngineInterface;

/**
 * Class Twig
 * @package Phalcon\Mvc\View\Engine
 */
class Twig extends Engine implements EngineInterface
{
    const DEFAULT_EXTENSION = '.html.twig';

    protected $environment;

    public function __construct($view, $dependencyInjector, array $environmentOptions = [])
    {
        parent::__construct($view, $dependencyInjector);

        $loader = new \Twig_Loader_Filesystem($this->getView()->getViewsDir());
        $this->environment = new \Twig_Environment($loader, $environmentOptions);
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    public function render($path, $params, $mustClean = false)
    {
        if (!$params) {
            $params = [];
        }

        $content = $this->environment->render(str_replace($this->getView()->getViewsDir(), '', $path), $params);
        if ($mustClean) {
            $this->getView()->setContent($content);

            return ;
        }

        echo $content;
    }
}
