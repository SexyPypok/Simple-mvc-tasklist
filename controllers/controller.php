<?php
    abstract class controller
    {
        protected $tasks_actions;

        public function __construct()
        {
            $this->auth = new auth();
        }

        

        public function get_body($class)
        {
            $this->get_content();
            include 'views/index.php';
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