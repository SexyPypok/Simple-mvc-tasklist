<?php
    class auth extends controller 
    {
        protected $auth_model;
        protected $class;
        
        public function __construct($class)
        {
            if($_SESSION['id'])
            {
                header('Location: index.php?c=tasklist&method=get_body');
            }

            $this->auth_model = new auth_model();
            $this->class = $class;
        }

        public function get_content()
        {
            if($_POST['login'] && $_POST['password'])
            {
                $auth = $this->auth($_POST['login'], $_POST['password']);
                if($auth)
                {
                    $this->auth_model->set_session($auth['id']);
                    header('Location: ?c=tasklist&method=get_body');
                }
            }
        }

        public function auth()
        {
            $result = $this->auth_model->login($_POST['login'], $_POST['password']);

            if($result)
            {
                header('Location: index.php?c=tasklist&method=get_body');
            }
        }
    }
?>