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

        if($_GET['page'] && $_SESSION['id']) 
        {
            $class = trim(strip_tags($_GET['page']));
            $method = trim(strip_tags($_GET['page']));
        }

        elseif($_SESSION['id'])
        {
            $class = 'tasklist'; 
        } //в контроллер

        else
        {
            $class = 'auth';
        }
        $obj = new $class;
        $route = $obj->routing();
        $method = $route[1];
        $obj->$method();// http://mvc/?page=tasklist&method=add_task, найти функцию 
        //проверка существования метода у класса 
        // формы в post, но в action url из get`ов
        $obj->get_body($class);
    ?>