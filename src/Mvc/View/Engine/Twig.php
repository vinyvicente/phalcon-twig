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
    protected $_twig;

    /**
     * @param mixed|\Phalcon\Mvc\ViewBaseInterface $view
     * @param mixed|\Phalcon\DiInterface $dependencyInjector
     * @param mixed|\Twig_Environment $environment
     */
    public function __construct($view, $dependencyInjector, $environment = null, $options = [])
    {
        parent::__construct($view, $dependencyInjector);

        if ($environment === null) {
            $loader = new \Twig_Loader_Filesystem($this->getView()->getViewsDir());
            $this->_twig = new \Twig_Environment($loader, $options);
        } else {
            $this->_twig = $environment;
        }
        
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

        $content = $this->_twig->render(str_replace($this->getView()->getViewsDir(), '', $path), $params);
        if ($mustClean) {
            $this->getView()->setContent($content);

            return ;
        }

        echo $content;
    }
}
