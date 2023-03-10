<?php

    class User {
        public static function genStr($step) {
            $i = 1;
            $strg = '';
            while ($i <= $step) {
                $shr_code = mt_rand ( 33, 124);
                if ($shr_code != 34 && $shr_code != 39 && $shr_code != 44 && $shr_code != 46 && $shr_code != 47 && $shr_code != 96) {
                    $shr = chr($shr_code);
                    $strg = $strg . $shr;
                    $i++;
                }
            }
            return $strg;
        }

        public static function register($name, $email, $phone, $password) {

            include_once ROOT . '/db/connect.php';
            $connect = new DB();
            $cipher = "aes-256-ofb";
            $iv = User::genStr(16);//openssl_random_pseudo_bytes($ivlen);
            $key = User::genStr(32);
            $pwd = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
            
            $query = 'INSERT INTO at_adm_users (name_user, email_user, phone_user, pwd_user, user_cif, user_iv, user_key) '
                . "VALUES ('$name', '$email', '$phone', '$pwd', '$cipher', '$iv', '$key')";
            
            return $connect->insertRowToDB($query);
        }
        
        /**
         * Редактирование данных пользователя
         * @param string $name
         * @param string $password
         */
        public static function edit($id, $name, $email, $phone, $password) {
            //$db = Db::getConnection();
            $connect = new DB();
            $cipher = "aes-256-ofb";
            $iv = User::genStr(16);
            $key = User::genStr(32);
            $pwd = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
            $sql = "UPDATE at_adm_users SET name_user = '$name', email_user = '$email', phone_user = '$phone',
                pwd_user = '$pwd', user_cif = '$cipher', user_iv = '$iv', user_key = '$key'
                WHERE id_user = $id";
        
            return $connect->updateRowInTable($sql);
        }

        public static function addRoles($email, $roles_html) {
            $db = new DB();

            $sql = "SELECT id_user FROM at_adm_users WHERE email_user = '$email'";
            $id = $db->getList($sql, 5);
            
            $sql = '';
            $sql = $sql . "INSERT INTO at_adm_con_users_roles (id_user, id_role) VALUES";
            foreach($roles_html as $role) {
                $sql = $sql . "($id, $role),";
            }
            $sql = substr($sql,0,-1);
            return $db->insertRowToDB($sql);
        }

        /**
         * Проверяем существует ли пользователь с заданными $email и $password
         * @param string $email
         * @param string $password
         * @return mixed : ingeger user id or false
         */
        public static function checkUserData($email, $password) {
            include_once ROOT . '/php/db/db.php';
            $user = array();
            if ($email != '') {
                $connect = new DB;
            
                //$pwd = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
            
                $query = "SELECT * FROM at_adm_users WHERE email_user = '$email'";

                $user = $connect->getList($query, 6);
                $cipher = $user['user_cif'];
                $iv = $user['user_iv'];//openssl_random_pseudo_bytes($ivlen);
                $key = $user['user_key'];
                $pwd = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
                $query = "SELECT * FROM at_adm_users WHERE email_user = '$email' and pwd_user = '$pwd'";
                $user = $connect->getList($query, 6);
            }

            if ($user) {
                return $user['id_user'];
            }

            return false;
        }

        public static function checkUserDataAdm($nic, $pwd) {
            include_once ROOT . '/php/db/db.php';
            $user = array();
            if ($nic != '') {
                $db = new DB;

                //$pwd = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
            
                $qry = "SELECT * FROM adm_users_adm WHERE login_adm = '$nic'";

                $user = $db->runQry($qry, 1);
                $cipher = $user['user_adm_cif'];
                $iv = $user['user_adm_iv'];//openssl_random_pseudo_bytes($ivlen);
                $key = $user['user_adm_key'];
                $pwd = openssl_encrypt($pwd, $cipher, $key, $options=0, $iv);
                $query = "SELECT * FROM adm_users_adm WHERE login_adm = '$nic' and passwd_adm = '$pwd'";
                $user = $db->runQry($query, 1);
            }

            if ($user) {
                return $user['id_user_adm'];
            }

            return false;
        }
        /**
         * Запоминаем пользователя
         * @param string $email
         * @param string $password
         */
        public static function auth($userId, $ch) {
            if ($ch == 1) {
                $_SESSION['user_adm'] = $userId;
            } else {
                $_SESSION['user'] = $userId;
            }
            
            // AdminBase::getRoles();
        }

        public static function checkLogged() {
            // Если сессия есть, вернем идентификатор пользователя
            if (isset($_SESSION['user'])) {
                return $_SESSION['user'];
            } else {
                header("Location: /user/login");
            }
        }

        public static function isGuest() {
            if (isset($_SESSION['user'])) {
                return false;
            }
            return true;
        }

        /**
         * Проверяет имя: не меньше, чем 2 символа
         */
        public static function checkName($name) {
            if (strlen($name) >= 2) {
                return true;
            }
            return false;
        }
        
        /**
         * Проверяет пароль: не меньше, чем 8 символов
         */
        public static function checkPassword($password) {
            if (strlen($password) >= 8) {
                return true;
            }
            return false;
        }
        
        /**
         * Проверяет email
         */
        public static function checkEmail($email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            return false;
        }
        
        public static function checkPhone($phone) {
            if (strlen($phone) >= 10) {
                return true;
            }
            return false;
        }

        public static function checkCard($card) {
            $pat_card = '{16}[0-9]';
            if(preg_match("~[0-9]{16}~", $card)) {
                return true;
            }
            return false;
        }

        public static function checkSbj($sbj) {
            if ($sbj != '') {
                return true;
            }
            return false;
        }

        public static function checkMsg($msg) {
            if ($msg != '') {
                return true;
            }
            return false;
        }

        public static function checkCaptcha($cap) {
            if (md5(md5($cap)) == $_SESSION['captcha_value']) {
                return true;
            }
            return false;
        }

        public static function checkEmailExists($email) {
            include_once ROOT . '/db/connect.php';
            $connect = new DB();

            $query = 'SELECT COUNT(*) FROM at_adm_users WHERE email_user = ' . "'$email'";

            $result = $connect->getList($query, 5);

            if($result)
                return true;
            return false;
        }
        
        /**
         * Returns user by id
        * @param integer $id
        */
        public static function getUserById($id) {
            include_once ROOT . '/php/db/db.php';

            if ($id) {
                $db = new DB();

                $sql = 'SELECT * FROM adm_users_adm WHERE id_user_adm = ' . $id;

                return $db->runQry($sql, 1);
            }
        }

        public static function getUserRoles($Id) {
            include_once ROOT . '/db/connect.php';

            if ($Id) {
                $connect = new DB();
                $sql = "SELECT a.id_user, b.id_role FROM at_adm_users a, at_adm_roles b, at_adm_con_users_roles c
                    WHERE a.id_user = $Id AND a.id_user = c.id_user AND c.id_role = b.id_role";
                
                return $connect->getList($sql, 12);
            }
        }

        public static function deleteRoles($id) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();

            $sql = "DELETE FROM at_adm_con_users_roles WHERE id_user = $id";
            return $db->deleteRowFromTable($sql);
        }

        public static function getUsersList() {
            include_once ROOT . '/db/connect.php';
            $db = new DB();
            $sql = "SELECT id_user, name_user, email_user, phone_user FROM at_adm_users";
            return $db->getList($sql, 16);
        }

        public static function getAdmUsersList() {
            include_once ROOT . '/php/db/db.php';
            $db = new DB();
            $sql = "SELECT b.name_country, c.name_city, a.first_name_adm, a.last_name_adm,
                a.phone_num_adm, a.email_adm, a.login_adm FROM adm_users_adm a,
                sp_countries b, sp_cities c WHERE a.id_country = b.id_country AND
                a.id_city = c.id_city";
            return $db->runQry($sql, 2);
        }

        public static function getRolesList(){
            include_once ROOT . '/db/connect.php';
            $db = new DB();
            $sql = "SELECT * FROM at_adm_roles";
            return $db->getList($sql, 18);
        }

        public static function deleteUserById($id) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();

            $sql = "DELETE FROM at_adm_con_users_roles WHERE id_user = $id";
            $res = $db->deleteRowFromTable($sql);

            $sql = "SELECT id_ord FROM at_shop_orders WHERE id_user = $id";
            $orders = $db->getList($sql, 17);
            foreach ($orders as $ord) {
                $sql = "DELETE FROM at_shop_order_detail WHERE id_ord = " . $ord['id_ord'];
                $res = $db->deleteRowFromTable($sql);
            }
            $sql = "DELETE FROM at_shop_orders WHERE id_user = $id";
            $res = $db->deleteRowFromTable($sql);

            $sql = "DELETE FROM at_adm_users  WHERE id_user = $id";
            $res = $db->deleteRowFromTable($sql);

            return true;
        }
    }
?>
