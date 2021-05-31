<?php
    class controller
    {
        public function get_body()
        {
            $content = $this->get_content();
            
            require_once('views/header.php');
            require_once('views/markup_start.php');
            require_once('views/'.$this->class.'.php');

            if($_SESSION['id'])
            {
                require_once('views/logout.php');
            }

            require_once('views/markup_end.php'); 
        }
    }
?>