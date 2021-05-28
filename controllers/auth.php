<?php
    class auth extends controller 
    {
        protected $auth_model;
        
        public function __construct()
        {
            $this->auth_model = new auth_model();
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

        public function auth($login, $password)
        {
            $result = $this->auth_model->login($login, $password);
            return $result;
        }

        public function deauth($deauth)
        {
            if($deauth)
            {
                $this->auth_model->deauth();
            }
        }
    }
?>