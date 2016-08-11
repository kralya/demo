<?php

class ShowController extends BaseController
{
    public function __construct()
    {
        $this->setTemplateName('show');
    }

    public function execute()
    {
        session_start();
        $errors = empty($_SESSION['errors']) ? [] : $_SESSION['errors'];
        $successes = empty($_SESSION['success']) ? [] : $_SESSION['success'];
        unset($_SESSION['errors']);
        unset($_SESSION['success']);

        return $this->render(['errors' => $errors, 'successes' => $successes]);
    }
}