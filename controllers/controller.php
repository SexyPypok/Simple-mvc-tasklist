<?php
    class controller
    {
        protected $auth;
        protected $tasks_actions;

        public function __construct($user_id)
        {
            if($user_id == NULL)
            {
                $_SESSION['id'] = 'na';
            }
            $this->auth = new auth();
            $this->tasks_actions = new tasks_actions();
        }

        public function auth_test($user_id, $login, $password)
        {
            if($user_id == 'na' && $login && $password)
            {
                $result = $this->auth->login($login, $password);
                return $result;
            }
        }

        public function deauth($deauth)
        {
            if($deauth)
            {
                $this->auth->deauth();
            }
        }

        public function show_tasks($user_id)
        {
            if($user_id != 'na')
            {
                $tasks = $this->tasks_actions->show_tasks($user_id);
                return $tasks;
            }

            else
            {
                return 0;
            }
        }

        public function remove_all($user_id, $button)
        {
            if($button)
            {
                $this->tasks_actions->remove_all_tasks($user_id);
            }
        }

        public function ready_all($user_id, $button)
        {
            if($button)
            {
                $this->tasks_actions->ready_all_tasks($user_id);
            }
        }

        public function remove_task($user_id, $task_id)
        {
            if($task_id)
            {
                $this->tasks_actions->remove_task($user_id, $task_id);
            }
        }

        public function ready_task($user_id, $task_id)
        {
            if($task_id)
            {
                $this->tasks_actions->ready_task($user_id, $task_id);
            }
        }

        public function add_task($user_id, $description, $button)
        {
            if($button)
            {
                $this->tasks_actions->add_task($user_id, $description);
            }
        }
    }
?>