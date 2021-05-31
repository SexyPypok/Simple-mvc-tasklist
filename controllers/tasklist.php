<?php
    class tasklist extends controller
    {
        public $tasks_model;
        public $auth_model;
        protected $class;

        public function __construct($class)
        {
            $this->tasks_model = new tasks_model();
            $this->auth_model = new auth_model();
            $this->class = $class;
        }

        public function get_content()
        {
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

        public function remove_all()
        {
            $this->tasks_model->remove_all_tasks($_SESSION['id']);
            $this->get_body();
        }

        public function ready_all()
        {
            $this->tasks_model->ready_all_tasks($_SESSION['id']);
            $this->get_body();
        }

        public function remove_task()
        {
            $this->tasks_model->remove_task($_SESSION['id'], $_POST['remove_task_button']);
            $this->get_body();
        }

        public function ready_task()
        {
            $this->tasks_model->ready_task($_SESSION['id'], $_POST['ready_task_button']);
            $this->get_body();
        }

        public function add_task()
        {
            if($_POST['add_task_text'])
            {
                $this->tasks_model->add_task($_SESSION['id'], $_POST['add_task_text']);
            }

            $this->get_body();
        }

        public function deauth()
        {
            $this->tasks_model->deauth();
            header('Location: index.php');
        }
    }
?>