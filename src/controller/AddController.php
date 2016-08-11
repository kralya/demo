<?php

class AddController extends BaseController
{
    public function __construct()
    {
        $this->setTemplateName('redirect');
    }

    public function execute()
    {
        session_start();

        if ($errors = $this->validate($_POST)) {
            $_SESSION['errors'] = $errors;
        } else {
            if ($this->fileUploaded() && $this->wrongExtension()) {
                $_SESSION['errors'] = ['Wrong image extension'];
                return $this->render(['to' => 'show'], false);
            }

            $tryUpload = $this->processUploaded();

            if (false === $tryUpload[0]) {
                $_SESSION['errors'] = ['failed to upload file, '.$tryUpload[1]];
                return $this->render(['to' => 'show'], false);
            }


            $filename = $tryUpload[1];

            $_SESSION['success'] = ['New response was added. It will be published after moderation.'];

            (new MessageRepo())->add($_POST['name'], $_POST['email'], $_POST['text'], $filename);
        }

        return $this->render(['to' => 'show'], false);
    }

    private function fileUploaded()
    {
        return !empty($_FILES['image_field']['name']) && '' !== $_FILES['image_field']['name'];
    }

    private function wrongExtension()
    {
        $allowed =  array('gif','png' ,'jpg');
        $filename = $_FILES['image_field']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        return !in_array(strtolower($ext),$allowed);
    }

    private function processUploaded()
    {
        $handle = new upload($_FILES['image_field']);
        if ($handle->uploaded) {
            $handle->file_new_name_body   = 'image_resized';
            $handle->image_resize         = true;
            $handle->image_x              = 320;
            $handle->image_y              = 240;
            $handle->image_ratio_fill        = true;

//            var_dump($_SERVER['DOCUMENT_ROOT'] .'/demo/downloads/');
//            die();

            $handle->process($_SERVER['DOCUMENT_ROOT'] .'/demo/downloads/');
            if ($handle->processed) {
                $handle->clean();
                return [true, $handle->file_dst_name];
            } else {
                return [false, $handle->error];
            }
        }

        return [true, ''];
    }

    private function validate($data)
    {
        $errors = [];

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Wrong email format';
        }

        if(empty($data['text'])){
            $errors[] = 'Please enter some text';
        }

        if(empty($data['name'])){
            $errors[] = 'Please enter name';
        }

        return $errors;
    }
}