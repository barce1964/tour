<?php

    include_once ROOT . '/php//models/User.php';

    class ContactsController {

        public function actionContacts() {
            require_once ROOT . '/php/mailer/PHPMailerAutoload.php';
            
            if (isset($_SESSION['user'])) {
                $user = User::getUserById($_SESSION['user']);
                $userEmail = $user['email_user'];
                $userName = $user['name_user'];
            } else {
                $userEmail = '';
                $userName = '';
            }

            $userName = '';
            $userPhone = '';
            $userEmail = '';
            $userSubject = '';
            $userText = '';
            $userCaptcha = '';
            
            $result = false;

            if (isset($_POST['submit'])) {
                
                // echo '2 ' . $_SESSION['count'];
                $userName = $_POST['name'];
                $userPhone = $_POST['phone'];
                $userEmail = $_POST['email'];
                $userSubject = $_POST['subject'];
                $userText = $_POST['mes'];
                $userCaptcha = $_POST['captcha'];
                if ($_POST['notrob'] == 'on') {
                    $cap1 = true;
                } else {
                    $cap1 = false;
                }
                $errors = false;

                // Валидация полей
                if (!User::checkName($userName)) {
                    $errors[0] = 'Имя короче 4 символов';
                }

                if (!User::checkPhone($userPhone)) {
                    $errors[1] = 'Неверный номер телефона';
                }

                if (!User::checkEmail($userEmail)) {
                    $errors[2] = 'Неправильный email';
                }
                
                if (!User::checkSbj($userSubject)) {
                    $errors[3] = 'Поле пустое';
                }

                if (!User::checkMsg($userText)) {
                    $errors[4] = 'Незаполнено поле';
                }

                if (!user::checkCaptcha($userCaptcha)) {
                    $errors[5] = 'Введен неверный текст';
                    $userCaptcha = '';
                }
                
                if ($errors == false) {

                    $mail = new PHPMailer;
                    $mail->CharSet = 'utf-8';

                    $mail->isSMTP();
                    $mail->Host = 'smtp.beget.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'alex@kprutkov.ru';
                    $mail->Password = 'Ale20X10v19T1964_ex10';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
 
                    if ($userName != '') {
                        $mail->setFrom('alex@kprutkov.ru', $userName);
                    } else {
                        $mail->setFrom('alex@kprutkov.ru', $userEmail);
                    }
                     
                    $mail->addAddress('alexvictar@mail.ru');

                    $mail->isHTML(true);

                    $mail->Subject = $userSubject;
                    $mail->Body = $userPhone . '<br>' . $userEmail . '<br>' . $userText;
                    
                    $userName = '';
                    $userPhone = '';
                    $userEmail = '';
                    $userSubject = '';
                    $userText = '';
                    $userCaptcha = '';
                    $cap1 = false;

                    if(!$mail->send()) {
                        $result = false;
                    } else {
                        $result = true;
                    }
                    // echo '3 ' . $_SESSION['count'];
                    // header("location: /contacts");
                } else {
                    $userCaptcha = '';
                }
                
            }

            require_once(ROOT . '/php/views/contacts/index.php');
            
            return true;
        }   

    }
?>
