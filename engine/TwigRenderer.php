<?php

namespace app\engine;


use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    protected $templater;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem('../views/twig');
        $this->templater = new \Twig_Environment($loader);
    }

    public function renderTemplate($template, $params = []) {

        $filename = $template . ".twig";

        return $this->templater->render($filename, $params);

    }
}