<?php

    class Location {
        public static function getCountriesList() {
            include_once ROOT . '/php/db/db.php';
            $db = new DB;

            $qry = "SELECT * FROM sp_countries ORDER BY name_country";
            return $db->runQry($qry, 3);
        }
    }
?>