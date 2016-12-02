<?php

use Phalcon\Mvc\Controller;

/**
 * Class IndexController
 * @package Phalcon\Mvc\Controller
 */
class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->phrase = 'World!';
    }
}
