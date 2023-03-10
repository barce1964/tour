<?php

    class AdminUserController {

        public function actionLogin() {
            
            $nic = '';
            $pwd = '';
            
            if (isset($_POST['submit'])) {
                $nic = $_POST['nic'];
                $pwd = $_POST['passwd'];
                $cap = $_POST['captcha'];
                
                $errors = false;
                
                include_once ROOT . '/php/models/User.php';
                $userId = User::checkUserDataAdm($nic, $pwd);
                
                if ($userId == false) {
                    // Если данные неправильные - показываем ошибку
                    $errors[0] = 'Неправильные  "Имя пользователя"';
                    $errors[1] = ' или "Пароль"';
                }

                if (!User::checkCaptcha($cap)) {
                    $errors[3] = 'Неверный текст';
                }

                    // Если данные правильные, запоминаем пользователя (сессия)
                if ($errors == false) {
                    User::auth($userId, 1);
                    
                    header("Location: order"); 
                }
                    
            }
            
            require_once(ROOT . '/php/views/admin/user/login.php');

            return true;
        }

        public function actionProfile() {
            
            include_once ROOT . '/php/models/User.php';
            $user = User::getUserById($_SESSION['user_adm']);
            $name = $user['first_name_adm'];
            $lastname = $user['last_name_adm'];
            $phone = $user['phone_num_adm'];
            $email = $user['email_adm'];
            $card = $user['card_num_user_adm'];
            $nic = $user['login_adm'];

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $card = $_POST['card'];
                $nic = $_POST['nic'];
                $pwd = $_POST['pwd'];

                $errors = false;

                if (!User::checkPhone($phone)) {
                    $errors[2] = "Номер телефона не короче 10 символов";
                }

                if (!User::checkEmail($email)) {
                    $errors[3] = "Ошибочный Email";
                }

                if (!User::checkCard($card)) {
                    $errors[4] = "Номер карты должен быть 16 цифр";
                }

                if (!User::checkName($nic)) {
                    $errors[5] = "Ник не может быть короче 2 символов";
                }

                if ($pwd != '') {
                    if (!User::checkPassword($pwd)) {
                        $errors[6] = "Пароль не может быть короче 8 символов";
                    }
                }

                if ($errors == false) {
                    include_once ROOT . '/php/db/db.php';
                    $db = new DB;
                    $id_user = $_SESSION['user_adm'];
                    if ($pwd == '') {
                        $qry = "UPDATE adm_users_adm SET first_name_adm = '$name', last_name_adm = '$lastname',
                            phone_num_adm = '$phone', email_adm = '$email', card_num_user_adm = '$card',
                            login_adm = '$nic' WHERE id_user_adm = '$id_user'";
                    } else {
                        $cipher = "aes-256-ofb";
                        $iv = User::genStr(16);
                        $key = User::genStr(32);
                        $pwd = openssl_encrypt($pwd, $cipher, $key, $options=0, $iv);
                        $qry = "UPDATE adm_users_adm SET first_name_adm = '$name', last_name_adm = '$lastname',
                            phone_num_adm = '$phone', email_adm = '$email', card_num_user_adm = '$card',
                            login_adm = '$nic', user_adm_cif = '$cipher', user_adm_iv = '$iv', user_adm_key = '$key',
                            passwd_adm = '$pwd' WHERE id_user_adm = '$id_user'";
                    }
                    $db->runQry($qry, 0);
                    
                }

            }

            require_once(ROOT . '/php/views/admin/user/profile.php');

            return true;
        }

        public function actionLogout() {
            unset($_SESSION["user_adm"]);
            header("Location: /admin");
        }

        public function actionUsers() {
            include_once ROOT . '/php/models/User.php';
            $listUsr = User::getAdmUsersList();
            // print_r($listUsr);
            require_once(ROOT . '/php/views/admin/user/users.php');

            return true;
        }

        public function actionCreate() {
            
            include_once ROOT . '/php/models/User.php';
           
            $name = '';
            $lastname = '';
            $phone = '';
            $email = '';
            $nic = '';
            $pwd = '';
            
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $nic = $_POST['nic'];
                $pwd = $_POST['pwd'];

                $errors = false;
            
                if (!User::checkPhone($phone)) {
                    $errors[2] = "Номер телефона не короче 10 символов";
                }

                if (!User::checkEmail($email)) {
                    $errors[3] = "Ошибочный Email";
                }

                if (!User::checkName($nic)) {
                    $errors[4] = "Ник не может быть короче 2 символов";
                }

                if (($pwd == '') && (!User::checkPassword($pwd))) {
                    $errors[5] = "Пароль не может быть пустым или короче 8 символов";
                }

                if ($errors == false) {

                    $cipher = "aes-256-ofb";
                    $iv = User::genStr(16);
                    $key = User::genStr(32);
                    $pwd = openssl_encrypt($pwd, $cipher, $key, $options=0, $iv);
                    $qry = "INSERT INTO adm_users_adm (first_name_adm, last_name_adm,
                        phone_num_adm, email_adm, card_num_user_adm, login_adm, user_adm_cif,
                        user_adm_iv, user_adm_key, passwd_adm) VALUES ('$name', '$lastname',
                        '$phone', '$email', '0000000000000000', '$nic', '$cipher', '$iv', '$key',
                        '$pwd')";

                    echo $qry . '<br>';
                    $db->runQry($qry, 0);
                    
                    header("Location: users");
                }

            }

            require_once(ROOT . '/php/views/admin/user/create.php');

            return true;
        }
    }
?>