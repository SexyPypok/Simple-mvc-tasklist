<?php
    class tasks_model extends database
    {

        public function add_task($user_id, $task_text)
        {
            $date = date('Y-m-d G:i');
            $add_task_sql = "INSERT INTO `tasks`(`user_id`, `description`, `created_at`, `status`)
                VALUES (:user_id,:task_text,:date,'0')";
            $add_task_query = $this->pdo->prepare($add_task_sql);
            $add_task_query->bindParam(':user_id', $user_id);
            $add_task_query->bindParam(':task_text', htmlspecialchars($task_text, ENT_QUOTES));
            $add_task_query->bindParam(':date', $date);
            $add_task_query->execute(); 
        }

        public function remove_all_tasks($user_id)
        {
            $remove_all_tasks_sql = "DELETE FROM `tasks` WHERE `user_id` = :user_id";
            $remove_all_tasks_query = $this->pdo->prepare($remove_all_tasks_sql);
            $remove_all_tasks_query->bindParam(':user_id', $user_id);
            $remove_all_tasks_query->execute();
        }

        public function ready_all_tasks($user_id)
        {
            $ready_all_tasks_sql = "UPDATE `tasks` SET `status` = '1' WHERE `user_id` = :user_id";
            $ready_all_tasks_query = $this->pdo->prepare($ready_all_tasks_sql);
            $ready_all_tasks_query->bindParam(':user_id', $user_id);
            $ready_all_tasks_query->execute();
        }

        public function ready_task($user_id, $task_id)
        {
            $ready_task_check_status_sql = "SELECT `status` FROM `tasks` WHERE `id` = :task_id";
            $ready_task_check_status_query = $this->pdo->prepare($ready_task_check_status_sql);
            $ready_task_check_status_query->bindParam(':task_id', intval($task_id));
            $ready_task_check_status_query->execute();
            $task_status = $ready_task_check_status_query->fetch();
    
            if($task_status['status'] == 0)
            {
                $status = 1;
            }
    
            else
            {
                $status = 0;
            }
    
            $ready_task_sql = "UPDATE `tasks` SET `status` = '$status' WHERE `user_id` = :user_id  AND
                `id` = :task_id";
            $ready_task_query = $this->pdo->prepare($ready_task_sql);
            $ready_task_query->bindParam(':user_id', $user_id);
            $ready_task_query->bindParam(':task_id', intval($task_id));
            $ready_task_query->execute();
        }

        public function remove_task($user_id, $task_id)
        {
            $remove_task_sql = "DELETE FROM `tasks` WHERE `id` = :task_id AND `user_id` = :user_id";
            $remove_task_query = $this->pdo->prepare($remove_task_sql);
            $remove_task_query->bindParam(':task_id', intval($task_id));
            $remove_task_query->bindParam(':user_id', $user_id);
            $remove_task_query->execute();
        }

        public function show_tasks($user_id)
        {
            $show_tasks_sql = "SELECT * FROM `tasks` WHERE `user_id` = :user_id
                ORDER BY `tasks`.`created_at`  DESC";
            $show_tasks_query = $this->pdo->prepare($show_tasks_sql);
            $show_tasks_query->bindParam(':user_id', $user_id);
            $show_tasks_query->execute();
            $out = array();
            foreach($show_tasks_query as $row)
            {
                $out[] = $row;
            }
            return $out;
        }

        public function task_status($task_status)
        {
            switch ($task_status)
            {
                case '0':
                    $switch[0] = 'Ready';
                    $switch[1] = 'red';
                    break;

                case '1':
                    $switch[0] = 'Unready';
                    $switch[1] = 'green';
                    break;
            }  
            return $switch;
        }

        public function deauth()
        {
            session_unset();
        }
    }
?>