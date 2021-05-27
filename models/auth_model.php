<?php
    class auth_model extends database
    {
        public function login($login, $password)
        {
            $auth_user_sql = "SELECT * FROM `users` WHERE `login` = :login";
            $auth_user_query = $this->pdo->prepare($auth_user_sql);
            $auth_user_query->bindParam(':login', $login);
            $auth_user_query->execute();
            $user_info = $auth_user_query->fetch();
            if(password_verify($password, $user_info['password']) && $user_info)
            {
                $this->set_session($user_info['login'], $user_info['id']);
                print_r($_SESSION);
                return '0';
            }

            elseif($user_info)
            {
                return '1';
            }

            else
            {
                $password = password_hash(($password), PASSWORD_BCRYPT);
                $date = date('Y-m-d G:i');
                $reg_user_sql = "INSERT INTO `users`(`login`, `password`, `created_at`)
                    VALUES (:login, :password, :date)";
                $reg_user_query =$this->pdo->prepare($reg_user_sql);
                $reg_user_query->bindParam(':login', $login);
                $reg_user_query->bindParam(':password', $password);
                $reg_user_query->bindParam(':date', $date);
                $reg_user_query->execute();
                $auth_user_query->execute();
                $user_info = $auth_user_query->fetch();
                $this->set_session($user_info['login'], $user_info['id']);
                return '0';
            }
        }

        public function deauth()
        {
            session_unset();
        }

        public function set_session($login, $id)
        {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $id;
            $_SESSION['page'] = 'tasklist';
        }
    }
?>