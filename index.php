<?php session_start();

    spl_autoload_register(function ($cl) 
    {
        if(file_exists('models/' . $cl . '.php'))
        {
            require_once('models/' . $cl . '.php');
        }

        elseif(file_exists('controllers/' . $cl . '.php'))
        {
            require_once('controllers/' . $cl . '.php');
        }
    });

    if($_GET['c'] && $_SESSION['id'] && $_GET['method']) 
    {
        $class = $_GET['c'];
        $method = $_GET['method'];
    }

    else
    {
        $class = 'auth';
        $method = 'get_body';
    }


    if(method_exists($class, $method))
    {
        $obj = new $class($class);
        $obj->$method();
    }

    else
    {
        $obj = new controller();
        $obj->error();
    }
    //$method = $route[1];
    //$obj->$method();// http://mvc/?page=tasklist&method=add_task, найти функцию 
    //проверка существования метода у класса 
    // формы в post, но в action url из get`ов
    //использовать функцию, как index.php
    // сделать подключение страницы инклюдом в функции
    //добавить проверку наличия метода if(method_exist)
    //изменить получение данных из гета
?>