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
            $this->auth_test($_SESION['id'], $_POST['login'], $_POST['password']);
        }

        public function auth_test($user_id, $login, $password)
        {
            if($login && $password)
            {
                $result = $this->auth_model->login($login, $password);
            }
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