<?php

    class AboutController {

        public function actionAbout() {
            require_once(ROOT . '/php/views/about/index.php');

            return true;
        }

    }
?>