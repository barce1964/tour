<?php

    class AdminController {

        public function actionAdmin() {
            require_once(ROOT . '/php/views/admin/index.php');

            return true;
        }

    }
?>