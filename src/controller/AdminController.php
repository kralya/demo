<?php

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->setTemplateName('redirect');
    }

    public function execute()
    {
        session_start();
        $login = empty($_SESSION['login']) ? [] : $_SESSION['login'];

        if (!$login){
            return $this->render(['to' => 'login'], false);
        }

        $this->setTemplateName('admin');
        return $this->render([]);
    }
}