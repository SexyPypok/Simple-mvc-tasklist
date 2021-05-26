<?php
    include 'markup_start.php';

    if($_SESSION['id'] == 'na' || $_SESSION['id'] == NULL)
    {
        include 'auth.php';
        if($auth == 1)
        {
            include 'incorrect_password.php';
        }
    }

    else
    {
        include 'header.php';
        include 'add_tasks.php';
        if($tasks)
        {
            include 'task.php';
        }
        include 'logout.php';
    }

    include 'markup_end.php';
?>