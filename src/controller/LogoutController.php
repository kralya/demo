<?php

class LogoutController extends BaseController
{
    public function __construct()
    {
        $this->setTemplateName('redirect');
    }

    public function execute()
    {
        session_start();
        session_destroy();

        return $this->render(['to' => 'login'], false);
    }
}