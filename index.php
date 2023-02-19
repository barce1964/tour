<?php
    define('ROOT', dirname(__FILE__));
    define('ROOTSRV', 'https://' . $_SERVER['SERVER_NAME']);
    define('CAPTCHA', 'https://' . $_SERVER['SERVER_NAME'] . '/php/captcha/captcha.php');
    
    require_once(ROOT . '/php/components/Autoload.php');

    //Установка соединения с БД

    // Начало сессии
    session_start();
    $_SESSION['count'] = 0;

    //Вызов Router
    $router = new Router();
    $router->run();
?>
