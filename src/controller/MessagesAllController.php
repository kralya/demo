<?php

class MessagesAllController extends BaseController
{
    public function __construct()
    {
        $this->setTemplateName('messages');
    }

    public function execute()
    {
        $messages = (new MessageRepo())->getAll();

        return $this->render(['messages' => $messages], false);
    }
}