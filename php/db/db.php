<?php
    class DB {
        public $host = 'localhost';
        public $db = 'tour';
        public $user = 'alex';
        public $pwd = 'A20v10T1964';

        public function getSelection($qry) {
            
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));
            
                $result = mysqli_query($con, $qry)
                    or die("Ошибка " . mysqli_error($con));
                mysqli_close($con);
                return mysqli_fetch_row($result);
        }

        public function runQry($qry, $idx) {
            
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            $result = mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));
            $i = 0;
            switch ($idx) {
                case 1:
                    $returnList = array();
                    while ($row = mysqli_fetch_row($result)) {
                        $returnList['id_user_adm'] = $row[0];
                        $returnList['id_country'] = $row[1];
                        $returnList['id_sp_city'] = $row[2];
                        $returnList['first_name_adm'] = $row[3];
                        $returnList['last_name_adm'] = $row[4];
                        $returnList['phone_num_adm'] = $row[5];
                        $returnList['email_adm'] = $row[6];
                        $returnList['parent_user_adm'] = $row[7];
                        $returnList['card_num_user_adm'] = $row[8];
                        $returnList['login_adm'] = $row[9];
                        $returnList['user_adm_cif'] = $row[10];
                        $returnList['user_adm_iv'] = $row[11];
                        $returnList['user_adm_key'] = $row[12];
                        $returnList['passwd_adm'] = $row[13];
                    }
                    break;

                case 2:
                    $returnList = array();
                    while ($row = mysqli_fetch_row($result)) {
                        $returnList[$i]['name_country'] = $row[0];
                        $returnList[$i]['name_city'] = $row[1];
                        $returnList[$i]['first_name_adm'] = $row[2];
                        $returnList[$i]['last_name_adm'] = $row[3];
                        $returnList[$i]['phone_num_adm'] = $row[4];
                        $returnList[$i]['email_adm'] = $row[5];
                        $returnList[$i]['login_adm'] = $row[6];
                        $i++;
                    }
                    break;

                case 3:
                    $returnList = array();
                    while ($row = mysqli_fetch_row($result)) {
                        $returnList[$i]['id_prod'] = $row[0];
                        $returnList[$i]['name_prod'] = $row[1];
                        $returnList[$i]['price_prod'] = $row[2];
                        $returnList[$i]['image_prod'] = $row[3];
                        $returnList[$i]['is_new'] = $row[4];
                        $i++;
                    }
                    break;

                    case 4:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_prod'] = $row[0];
                            $returnList[$i]['id_cat'] = $row[1];
                            $returnList[$i]['name_prod'] = $row[2];
                            $returnList[$i]['code_prod'] = $row[3];
                            $returnList[$i]['price_prod'] = $row[4];
                            $returnList[$i]['availability'] = $row[5];
                            $returnList[$i]['brand_prod'] = $row[6];
                            $returnList[$i]['image_prod'] = $row[7];
                            $returnList[$i]['descr_prod'] = $row[8];
                            $returnList[$i]['is_new'] = $row[9];
                            $returnList[$i]['is_rec'] = $row[10];
                            $returnList[$i]['status_prod'] = $row[11];
                            $i++;
                        }
                        break;

                    case 5:
                        $row = mysqli_fetch_row($result);
                        $returnList = $row[0];
                        break;

                    case 6:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList['id_user'] = $row[0];
                            $returnList['name_user'] = $row[1];
                            $returnList['email_user'] = $row[2];
                            $returnList['phone_user'] = $row[3];
                            $returnList['pwd_user'] = $row[4];
                            $returnList['user_cif'] = $row[5];
                            $returnList['user_iv'] = $row[6];
                            $returnList['user_key'] = $row[7];
                        }
                        break;

                    case 7:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList['id_user'] = $row[0];
                            $returnList['name_user'] = $row[1];
                            $returnList['email_user'] = $row[2];
                            $returnList['pwd_user'] = $row[3];
                        }
                        print_r($returnList);
                        break;

                    case 8:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_prod'] = $row[0];
                            $returnList[$i]['code_prod'] = $row[3];
                            $returnList[$i]['name_prod'] = $row[2];
                            $returnList[$i]['price_prod'] = $row[4];
                            $i++;
                        }
                        break;

                    case 9:
                        $returnList = array();
                        $row = mysqli_fetch_row($result);
                        $returnList['name_ord'] = $row[0];
                        $returnList['date_ord'] = $row[1];
                        $returnList['total_ord'] = $row[2];
                        $returnList['ord_is_finish'] = $row[3];
                        break;
        
                    case 10:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['prod_code'] = $row[0];
                            $returnList[$i]['prod_name'] = $row[1];
                            $returnList[$i]['prod_price'] = $row[2];
                            $returnList[$i]['prod_quantity'] = $row[3];
                            $returnList[$i]['prod_sum'] = $row[4];
                            $i++;
                        }
                        break;

                    case 11:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_prod'] = $row[0];
                            $returnList[$i]['name_prod'] = $row[1];
                            $returnList[$i]['price_prod'] = $row[2];
                            $returnList[$i]['image_prod'] = $row[3];
                            $returnList[$i]['is_new'] = $row[4];
                            $i++;
                        }
                        break;

                    case 12:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_user'] = $row[0];
                            $returnList[$i]['id_role'] = $row[1];
                            $i++;
                        }
                        break;

                    case 13:
                        $row = mysqli_fetch_row($result);
                        $returnList = $row[0];
                        break;

                    case 14:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_ord'] = $row[0];
                            $returnList[$i]['name_ord'] = $row[1];
                            $returnList[$i]['name_user'] = $row[2];
                            $returnList[$i]['phone_user'] = $row[3];
                            $returnList[$i]['date_ord'] = $row[4];
                            $returnList[$i]['ord_is_finish'] = $row[5];
                            $i++;
                        }
                        break;
                    
                    case 15:
                        $returnList = array();
                        $row = mysqli_fetch_row($result);
                        $returnList['name_ord'] = $row[0];
                        $returnList['date_ord'] = $row[1];
                        $returnList['total_ord'] = $row[2];
                        $returnList['ord_is_finish'] = $row[3];
                        $returnList['name_user'] = $row[4];
                        $returnList['phone_user'] = $row[5];
                        break;    

                    case 16:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_user'] = $row[0];
                            $returnList[$i]['name_user'] = $row[1];
                            $returnList[$i]['email_user'] = $row[2];
                            $returnList[$i]['phone_user'] = $row[3];
                            $i++;
                        }
                        break;

                    case 17:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_ord'] = $row[0];
                            $i++;
                        }
                        break;

                    case 18:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_role'] = $row[0];
                            $returnList[$i]['name_role'] = $row[1];
                            $i++;
                        }
                        break;

                    case 19:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_ord'] = $row[0];
                            $returnList[$i]['name_ord'] = $row[2];
                            $returnList[$i]['date_ord'] = $row[3];
                            $returnList[$i]['total_ord'] = $row[4];
                            $returnList[$i]['ord_is_finish'] = $row[5];
                            $i++;
                        }
                        break;    
    
                    default:
                        # code...
                        break;
            }
            mysqli_close($con);
            return $returnList;
        }

        public function insertRowToDB($qry) {
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            return mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));
            
        }

        public function updateRowInTable($qry) {
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            return mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));
        }

        public function deleteRowFromTable($qry) {
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            return mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));
        }

        public function lastInsertIdProd() {
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            $qry = 'SELECT MAX(id_prod) FROM at_shop_prod';
            
            $result = mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));

            $row = mysqli_fetch_row($result);
            return $row[0];
        }
    }    
?>
