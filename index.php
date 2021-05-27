<?php session_start();

        spl_autoload_register(function ($cl) 
        {
            if(file_exists('models/' . $cl . '.php'))
            {
                include 'models/' . $cl . '.php';
            }

            elseif(file_exists('controllers/' . $cl . '.php'))
            {
                include 'controllers/' . $cl . '.php';
            }
        });

        if($_SESSION['page'] == NULL || $_SESSION['id'] == NULL)
        {
            $_SESSION['page'] = 'auth';
        }

        $obj = new $_SESSION['page'];
        $obj->get_body($_SESSION['page']);

    ?>