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
        $routs = parse_url($_SERVER['REQUEST_URI']);
        $routs = explode('&', $routs['query']);
        $class = explode('c=', $routs[0])[1];
        $method = explode('method=', $routs[1])[1];
    }

    elseif($_SESSION['id'])
    {
        $class = 'tasklist';
        $method = 'get_body';
    }

    else
    {
        $class = 'auth';
        $method = 'get_body';
    }

    $obj = new $class($class);

    if(method_exists($class, $method))
    {
        $obj->$method();
    }

    else
    {
        echo 'error';
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