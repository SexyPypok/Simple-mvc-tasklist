<?php
    include 'markup_start.php';
    include 'auth_form.php';
    if($auth == 1)
    {
        include 'incorrect_password.php';
    }
    include 'markup_end.php';
?>