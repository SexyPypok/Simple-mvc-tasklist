<?php
    abstract class controller
    {

        function routing()
        {
            $routs = explode('/', $_SERVER['REQUEST_URI']);
            $routs = explode('?', $routs[1]);
            $routs = explode('&', $routs[1]);
            $result = array();
            foreach($routs as $row)
            {
                $result[] = trim($row, "&?");
            }
            print_r($result);
            return $result;
        }

        public function get_body($class)
        {
            $content = $this->get_content();
            require_once('views/markup_start.php');
            require_once('views/'.$class.'.php');
            require_once('views/markup_end.php'); 
        }
    }
?>