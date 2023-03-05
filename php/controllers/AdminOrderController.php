<?php

    class AdminOrderController {

        public function actionIndex() {
            
            require_once(ROOT . '/php/views/admin/order/index.php');

            return true;
        }

    }
?>