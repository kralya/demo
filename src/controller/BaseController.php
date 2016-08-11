<?php

class BaseController
{
    private $templateName = '';

    protected function setTemplateName($name)
    {
        $this->templateName = $name;
    }

    public function getTemplateName()
    {
        return $this->templateName;
    }

    protected function render($params, $includeLayout = true)
    {
        foreach ($params as $var => $param) {
            $$var = $param;
        }

        $safe = function($arg){return str_replace('"','\"', $arg);};

        $layout = file_get_contents('view/layout.html');

        ob_start();
        include('view/' . $this->getTemplateName() . '.php');
        $template = ob_get_clean();

        return $includeLayout ? str_replace('###template###', $template, $layout) : $template;
    }
}
