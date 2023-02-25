<?php

    class AdminUserController {

        public function actionLogin() {


            require_once(ROOT . '/php/views/admin/login/index.php');

            return true;
        }

    }
?>