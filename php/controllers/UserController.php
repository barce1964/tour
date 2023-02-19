<?php

    class UserController {

        public function actionRegister() {
            $name = '';
            $email = '';
            $phone = '';
            $password = '';
            $result = false;
            
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                
                $errors = false;
                
                if (!User::checkName($name)) {
                    $errors[] = 'Имя не должно быть короче 2-х символов';
                }
                
                if (!User::checkEmail($email)) {
                    $errors[] = 'Неправильный email';
                }
                
                if (!User::checkPassword($password)) {
                    $errors[] = 'Пароль не должен быть короче 8-ми символов';
                }
                
                if (User::checkEmailExists($email)) {
                    $errors[] = 'Такой email уже используется';
                }
                
                if (!User::checkPhone($phone)) {
                    $errors[] = 'Номер телефона должен быть не менее 10 цифр';
                }

                if ($errors == false) {
                    $result = User::register($name, $email, $phone, $password);
                }

            }


            require_once(ROOT . '/views/user/register.php');

            return true;
        }

        public function actionLogin() {
            $email = '';
            $password = '';
            
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $errors = false;
                            
                // Валидация полей
                if (!User::checkEmail($email)) {
                    $errors[] = 'Неправильный email';
                }            
                if (!User::checkPassword($password)) {
                    $errors[] = 'Пароль не должен быть короче 8-ти символов';
                }
                
                // Проверяем существует ли пользователь
                $userId = User::checkUserData($email, $password);
                
                if ($userId == false) {
                    // Если данные неправильные - показываем ошибку
                    $errors[] = 'Неправильные email или пароль';
                } else {
                    // Если данные правильные, запоминаем пользователя (сессия)
                    User::auth($userId);
                    
                    // Перенаправляем пользователя в закрытую часть - кабинет 
                    header("Location: /cabinet/"); 
                }

            }

            require_once(ROOT . '/views/user/login.php');

            return true;
        }
        
        /**
         * Удаляем данные о пользователе из сессии
         */
        public function actionLogout() {
            unset($_SESSION["user"]);
            unset($_SESSION['roles']);
            header("Location: /");
        }
    }
?>
