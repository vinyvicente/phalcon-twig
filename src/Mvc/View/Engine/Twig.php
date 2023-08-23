<?php

declare(strict_types=1);

namespace Phalcon\Mvc\View\Engine;

use Phalcon\DiInterface;
use Phalcon\Mvc\View\Engine;
use Phalcon\Mvc\View\EngineInterface;
use Phalcon\Mvc\ViewBaseInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class Twig extends Engine implements EngineInterface
{
    const DEFAULT_EXTENSION = '.html.twig';

    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @param mixed|ViewBaseInterface $view
     * @param mixed|DiInterface $dependencyInjector
     * @param array $options
     */
    public function __construct($view, $dependencyInjector, array $options = [])
    {
        parent::__construct($view, $dependencyInjector);

        $loader = new FilesystemLoader($this->getView()->getViewsDir());
        $this->twig = new Environment($loader, $options);
    }

    /**
     * @param $path
     * @param $params
     * @param bool $mustClean
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render($path, $params, $mustClean = false)
    {
        if (!$params) {
            $params = [];
        }

        $content = $this->twig->render(str_replace($this->getView()->getViewsDir(), '', $path), $params);
        if ($mustClean) {
            $this->getView()->setContent($content);

            return ;
        }

        echo $content;
    }
}
