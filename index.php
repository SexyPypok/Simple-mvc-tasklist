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

        $controller = new controller($_SESSION['id']);

        $exit = $controller->deauth($_GET['exit']);

        $auth = $controller->auth_test($_SESSION['id'], $_POST['login'], $_POST['password']);

        $remove_all = $controller->remove_all($_SESSION['id'], $_POST['remove_all_tasks_button']);

        $ready_all = $controller->ready_all($_SESSION['id'], $_POST['ready_all_tasks_button']);

        $ready_task = $controller->ready_task($_SESSION['id'], $_POST['ready_task_button']);

        $remove_task = $controller->remove_task($_SESSION['id'], $_POST['remove_task_button']);

        $add_task = $controller->add_task($_SESSION['id'], $_POST['add_task_text'], $_POST['add_task_button']);


        $tasks = $controller->show_tasks($_SESSION['id']);

        include 'views/index.php';
    ?>