<?php

class LoginController extends BaseController
{
    public function __construct()
    {
        $this->setTemplateName('login');
    }

    public function execute()
    {
        session_start();
        $login = $_SESSION['login'] = $this->login();

        if ($login){
            $this->setTemplateName('redirect');
            return $this->render(['to' => 'admin'], false);
        }

        return $this->render([]);
    }

    private function login()
    {
        if (isset($_POST['name']) && isset($_POST['password'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            // leaving unencrypted for the sake of simplicity and to prevent pumpkin transformation:
            if ('admin' === $name && '123' === $password) {
                return true;
            }
        }

        return empty($_SESSION['login']) ? [] : $_SESSION['login'];
    }
}