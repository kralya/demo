<?php

class ApproveController extends BaseController
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

        if (!empty($_POST['id'])){
            $totalEntries = (new MessageRepo())->find($_POST['id']);
            if (1 === count($totalEntries)){
                if(!empty($_POST['submit'])) {
                    if('Approve' == $_POST['submit']){
                        (new MessageRepo())->approve($_POST['id']);
                    } else {
                        (new MessageRepo())->disapprove($_POST['id']);
                    }
                }
            }
        }

        return $this->render(['to' => 'admin'], false);
    }
}