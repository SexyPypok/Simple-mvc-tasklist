<?php
    class tasklist extends controller
    {
        public $tasks_model;
        public $auth_model;

        public function __construct()
        {
            $this->tasks_model = new tasks_model();
            $this->auth_model = new auth_model();
        }

        public function get_content()
        {
            if($_GET['add_task_button'] && $_GET['add_task_text'] && $_SESSION['id'])
            {
                $this->add_task($_SESSION['id'], $_GET['add_task_text']);
            }

            if($_GET['exit'])
            {
                $this->auth_model->deauth();
                header('Location: ?page=auth');
            }

            $tasks = $this->show_tasks($_SESSION['id']);
            return $tasks;
        }

        public function show_tasks($user_id)
        {
            if($user_id)
            {
                $tasks = $this->tasks_model->show_tasks($user_id);
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

        public function add_task()
        {
            echo '124r435';
            $this->tasks_model->add_task($_SESSION['id'], $_POST['add_task_text']);
        }
    }
?>