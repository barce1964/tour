<?php

    class ToursController {

        public function actionTours() {
            require_once(ROOT . '/php/views/tours/index.php');

            return true;
        }

    }
?>
