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

    /**
     * @var \Twig_Environment
     */
    protected $_environment;

    /**
     * @param mixed|\Phalcon\Mvc\ViewBaseInterface $view
     * @param mixed|\Phalcon\DiInterface $dependencyInjector
     * @param array $options
     */
    public function __construct($view, $dependencyInjector, array $environmentoOptions = [])
    {
        parent::__construct($view, $dependencyInjector);

        $loader = new \Twig_Loader_Filesystem($this->getView()->getViewsDir());
        $this->_environment = new \Twig_Environment($loader, $options);
    }

    /**
     * @return \Twig_Environment
     */
    public function getEnvironment() {
        return $this->_environment;
    }

    /**
     * @param string $path
     * @param mixed $params
     * @param bool $mustClean
     */
    public function render($path, $params, $mustClean = false)
    {
        if (!$params) {
            $params = [];
        }

        $content = $this->_environment->render(str_replace($this->getView()->getViewsDir(), '', $path), $params);
        if ($mustClean) {
            $this->getView()->setContent($content);

            return ;
        }

        echo $content;
    }
}
