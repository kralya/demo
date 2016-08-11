<?php

ini_set('display_errors', 1);

$routes = [
    '/add' => 'AddController',
    '/login' => 'LoginController',
    '/admin' => 'AdminController',
    '/logout' => 'LogoutController',
    '/update' => 'UpdateController',
    '/approve' => 'ApproveController',
    '/messages' => 'MessagesController',
    '/messages-all' => 'MessagesAllController',
    '/' => 'ShowController',
];

$user = 'root';
$password = 'password';
$host = 'localhost';
$db = 'demo';