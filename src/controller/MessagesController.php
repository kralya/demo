<?php

class MessagesController extends BaseController
{
    public function __construct()
    {
        $this->setTemplateName('messages');
    }

    public function execute()
    {
        $messages = (new MessageRepo())->getAll(true);

        return $this->render(['messages' => $messages], false);
    }
}