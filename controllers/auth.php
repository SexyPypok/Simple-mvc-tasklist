<?php
    class auth extends controller 
    {
        protected $auth_model;
        protected $class;
        
        public function __construct($class)
        {
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
                    header('Location: ?page=tasklist');
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