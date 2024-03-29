<?php

    class DatabaseFunctions extends Connect
    {
        /*
            inputs e.g password, name; test; email
            1. function retrieves data from database base on input parameters
        */

        public static function getData($fields, $tbl, $field2, $value, $all=false)
        {
            parent::checkConnection();
            // used to get all fields from a table
            if ($all) {
                $query = "SELECT $fields FROM $tbl";

                $result = parent::returnConnection()->query($query);
                if ($result->num_rows <= 0) {
                    return array(false, false);
                }
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }


                return array(true, $data);
            }else {
                $val = 1;
                $query = "SELECT $fields FROM $tbl WHERE $field2='$value'";

                $result = parent::returnConnection()->query($query);
            }

            // close connection after query
            // Connect::closeConnection();
            // turn results into an associative array
            if ($result->num_rows > 0) {
                $result = $result->fetch_assoc();
                return array(true,$result);
            } else {
                return array(false);
            }
        }

        public static function getDataLimit($fields, $tbl, $field2, $value, $limit, $limit_val)
        {
            parent::checkConnection();
            if ($limit) {
                $query = "SELECT * FROM `$tbl` WHERE $field2='$value' LIMIT $limit_val";

                $result = parent::returnConnection()->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }

                    return array(true,$data);
                }else {
                    return array(false);
                }


            }else {
                $query = "SELECT * FROM `$tbl` WHERE $field2='$value'";

                $result = parent::returnConnection()->query($query);
                //
                if ($result->num_rows <= 0) {
                    return array(false, 'my if', gettype($result));
                }else {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }

                    return array(true,$data);
                }
            }


            // if ($result->num_rows > 0) {
            //     $result = $result->fetch_assoc();
            //
            // } else {
            //     return array(false);
            // }
        }


        public static function getProductData($tbl1, $tbl2, $field, $value, $one=false)
        {
            parent::checkConnection();
            //  livingroom.*, product_type.inner_cat_slug, product_type.cat_code FROM livingroom INNER JOIN product_type ON livingroom.product_type = product_type.id
            if ($one) {
                $query = "SELECT $tbl1.*, product_type.inner_cat_slug, product_type.cat_code FROM $tbl1 INNER JOIN product_type ON livingroom.product_type = product_type.id WHERE $tbl1.product_id='$value'";

                $result = parent::returnConnection()->query($query);

                if (!$result) {
                    return array(false);
                }

                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }

                return array(true, $data);
            }else {
                $query = "SELECT $tbl1.*, product_type.inner_cat_slug, product_type.cat_code FROM $tbl1 INNER JOIN product_type ON livingroom.product_type = product_type.id";

                $result = parent::returnConnection()->query($query);
                if (!$result) {
                    return array(false);
                }
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }

                return array(true, $data);
            }

        }

        public static function getOrderData($fields, $tbl, $criteria)
        {
            parent::checkConnection();

            $query = "SELECT $fields FROM $tbl WHERE cus_id='$criteria'";
            $result = parent::returnConnection()->query($query);
            $orders = array();

            while ($row = $result->fetch_assoc()) {
                $orders[] = $row;
            }

            return $orders;
        }

        public static function deleteInfo($tbl, $value)
        {
            parent::checkConnection();

            $query = "DELETE FROM $tbl WHERE customer_id='$value'";

            if (parent::returnConnection()->query($query)) {
                $result = true;

                return $result;
            } else {
                $result = false;

                return $result;
            }
        }

        public static function deleteInfoDynamic($tbl, $field, $value)
        {
            parent::checkConnection();

            $query = "DELETE FROM `$tbl` WHERE $field='$value'";

            if (parent::returnConnection()->query($query)) {
                $result = true;

                return $result;
            } else {
                $result = false;

                return $result;
            }
        }

        public static function createImageTable($tbl)
        {
            parent::checkConnection();

            $query = "CREATE TABLE `furniture`.`$tbl` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `sku_id` VARCHAR(1000) NOT NULL , `category` TEXT NOT NULL , `images` TEXT NOT NULL , `inventory` TEXT NOT NULL , `sku_type` TEXT NOT NULL , `sku_size` TEXT NOT NULL , `sku_color` TEXT NOT NULL , `sku_stripe_cat` TEXT NOT NULL , `sku_main_image` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";

            if (parent::returnConnection()->query($query)) {
                $result = true;

                return $result;
            } else {
                $result = false;

                return $result;
            }
        }


        public static function deleteFile($filename)
        {
            if (unlink(dirname(__DIR__).'/'.$filename)) {
                $result = array('777', 'Image deleted successfully');
                return $result;
            }else {
                $result = array('222', 'ERROR deleting '.$filename.' from server');
                return $result;
            }
        }

        public static function deleteUserAccount($value, $delete_cookie=true)
        {
            $query = "DELETE FROM users WHERE id='$value'";

            if (parent::returnConnection()->query($query)) {
				if ($delete_cookie) {
					$result = self::deleteData();
				}else {
					$result = 'deleted';
				}

                echo $result;
            } else {
                echo json_encode(array("ERROR","error deleting account"));
            }
        }

        public static function updateMultipleFields($tbl,$fields, $values, $field2, $value2, $json=false)
        {
            parent::checkConnection();
            // $fields = array e.g ['id', 'fname', 'lname']
            // $values = array e.g ['3', 'jason', 'reid']

			$setString = '';

            if ($json) {
                for ($i=0; $i < count($fields); $i++) {
                    // check if its the last value in array so we can remove the "," from the query
                    if ($i === count($fields)-1) {
                        $setString .= "$fields[$i]=$values[$i]";
                    }else {
                        $setString .= "$fields[$i]=$values[$i],";
                    }
                }
            }else {
                for ($i=0; $i < count($fields); $i++) {
                    // check if its the last value in array so we can remove the "," from the query
                    if ($i === count($fields)-1) {
                        $setString .= "$fields[$i]='$values[$i]'";
                    }else {
                        $setString .= "$fields[$i]='$values[$i]',";
                    }
                }
            }


            // return array($setString);

            $query = "UPDATE $tbl SET $setString WHERE $field2='$value2'";

            if (parent::returnConnection()->query($query)) {
                parent::returnConnection()->close();
                return array(true, $query);
            } else {
                parent::returnConnection()->close();
                return array(false, $query);
            }
        }

        public static function updateDatabase($fields, $tbl, $field2, $value, $value2, $ckcode)
        {
            parent::checkConnection();

            $query = "UPDATE $tbl SET $fields='$value' WHERE $field2='$value2'";

            if (parent::returnConnection()->query($query)) {

                // update the session & cookie's with new value e.g name, email
                if ($ckcode != "NO") {
                    setcookie($ckcode, $value, time() + 86400, "/");
                    //set session value equal to new name that is used to update info on page
                    $_SESSION[$ckcode] = $value;
                    // echo "\n Res: $res \n";
                }

                return true;
            } else {
                echo "error updating user";
            }
        }

        public static function countDatabaseFunction($table, $choice=false, $role=false)
        {
            if ($choice) {
                $query = "SELECT * FROM $table WHERE role='$role'";
            } else {
                $query = "SELECT * FROM $table";
            }

            $result = parent::returnConnection()->query($query);
            // echo "$result";

            return $result;
        }

        public static function getDetailsLogin($email)
        {
            parent::checkConnection();

            $query = "SELECT * FROM customers WHERE email='$email'";
            $result = parent::returnConnection()->query($query);

            if ($result->num_rows > 0) {
                parent::returnConnection()->close();
                return $result;
            } else {
                parent::returnConnection()->close();
                return false;
            }
        }

        public static function getLoggedInUser($email)
        {
            parent::checkConnection();

            $query = "SELECT cus_id, stripe_cus_id, title, fname, lname, dob, email, basket_id ,address FROM customers WHERE email='$email'";
            $result = parent::returnConnection()->query($query);

            if ($result->num_rows > 0) {
                parent::returnConnection()->close();
                return $result;
            } else {
                parent::returnConnection()->close();
                return false;
            }
        }

        public static function checkExists($email)
        {
            // open connection to database
            parent::checkConnection();

            $query = "SELECT * FROM customers WHERE email='$email'";

            $result = parent::returnConnection()->query($query);

            if ($result->num_rows > 0) {
                parent::returnConnection()->close();
                return true;

            } else {
                parent::returnConnection()->close();
                return false;

            }
        }

        public static function checkDataExists($tbl, $field, $value)
        {
            // open connection to database
            parent::checkConnection();

            $query = "SELECT * FROM $tbl WHERE $field='$value'";

            $result = parent::returnConnection()->query($query);

            if ($result->num_rows > 0) {
                parent::returnConnection()->close();
                return true;

            } else {
                parent::returnConnection()->close();
                return false;

            }
        }

        public static function checkTableExists($tbl)
        {
            // open connection to database
            parent::checkConnection();

            $query = "SELECT * FROM $tbl";

            $result = parent::returnConnection()->query($query);

            if ($result) {
                parent::returnConnection()->close();
                return true;

            } else {
                parent::returnConnection()->close();
                return false;

            }
        }


		// function is used when user logs out. it deletes cookie an/or session variables.
        public static function destroyLoggedInData()
        {
            if (isset($_COOKIE['idyl_tkn'])) {
                // echo "cookies deleted <br>";
                $tkn = $_COOKIE['idyl_tkn'];
                $deleteQuery = "DELETE FROM cookietable WHERE cookieID='$tkn'";

                parent::checkConnection();
                if (parent::returnConnection()->query($deleteQuery)) {
                    parent::returnConnection()->close();

                    // delete cookie data if cookie data is deleted from the database
                    setcookie('idyl_qni', "", time() - 86400, "/");
                    setcookie('idyl_tkn', "", time() - 86400, "/");
                    setcookie('idyl_unm', "", time() - 86400, "/");
                    setcookie('idyl_uem', "", time() - 86400, "/");


                    // exit(json_encode($msg));
                    $message = array(
                        'status'=>true,
                        'cookieCode'=>$tkn
                    );

                    $final = json_encode($message, true);
                    return $final;

                }else {
                    $message = array(
                        'status'=>true,
                        'cookieCode'=>$tkn
                    );

                    $final = json_encode($message, true);
                    return;
                }


            } elseif (isset($_SESSION)) {
                session_unset();
                session_destroy();

                // header('location: /');
                $msg = array(
                    'status'=>array(
    					'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=>array(
                        'msg'=>'session data destroyed successfully'
                    )
                );

                return json_encode($msg);

            }
        }

        public static function createUser($tbl, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9)
        {
            parent::checkConnection();

            $query = parent::returnConnection()->prepare("INSERT INTO $tbl (stripe_cus_id, title, fname, lname, dob, email, password, basket_id, address) VALUES (?,?,?,?,?,?,?,?,?)");

            $query->bind_param("sssssssss", $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9);

            // hash password for security
            $value7 = password_hash($value7, PASSWORD_DEFAULT);

            $query->execute();

            // close query
            $query->close();

            // close db connection
            parent::returnConnection()->close();

            return true;
        }

        public static function createRow($tbl, $fields, $value1, $value2)
        {
            Connect::checkConnection();

            $query = parent::returnConnection()->prepare("INSERT INTO $tbl $fields VALUES (?,?)");

            $query->bind_param('ss',$value1, $value2);
            $query->execute();

            $query->close();

            parent::returnConnection()->close();

            return true;

        }

        public static function addSkuImages($tbl, $fields, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9)
        {
            parent::checkConnection();

            $query = parent::returnConnection()->prepare("INSERT INTO `$tbl` $fields VALUES (?,?,?,?,?,?,?,?,?)");
            $errorlist = parent::returnConnection()->error;

            if ($query) {
                $query->bind_param('sssssssss',$value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9);

                $query->execute();

                $query->close();

                parent::returnConnection()->close();

                return array(true, $query);
            }else {
                return array(false, $query, $errorlist);
            }


        }

        public static function addToMailingList($fields, $value1, $value2, $value3)
        {
            parent::checkConnection();

            $query = parent::returnConnection()->prepare("INSERT INTO `mailinglist` $fields VALUES (?,?,?)");
            $errorlist = parent::returnConnection()->error;

            if ($query) {
                $query->bind_param('sss',$value1, $value2, $value3);
                $query->execute();

                $query->close();

                parent::returnConnection()->close();

                return array(true);
            }else {
                return array(false, $query, $errorlist);
            }


        }

        public static function addOrderData($tbl, $fields, $value1, $value2, $value3)
        {
            Connect::checkConnection();

            $query = parent::returnConnection()->prepare("INSERT INTO $tbl $fields VALUES (?,?, ?)");

            $query->bind_param('sss',$value1, $value2, $value3);
            if($query->execute()){
                $query->close();

                parent::returnConnection()->close();

                return true;
            }else {
                return false;
            }

        }

        public static function storeBlogImages($tbl, $fields, $value1, $value2, $value3)
        {
            Connect::checkConnection();

            $query = parent::returnConnection()->prepare("INSERT INTO $tbl $fields VALUES (?,?,?)");

            $query->bind_param('sss',$value1, $value2, $value3);
            if($query->execute()){
                $query->close();

                parent::returnConnection()->close();

                return true;
            }else {
                return false;
            }

        }

        public static function saveBlogPost($tbl, $fields, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10)
        {
            parent::checkConnection();

            $query = parent::returnConnection()->prepare("INSERT INTO `$tbl` $fields VALUES (?,?,?,?,?,?,?,?,?,?)");

            $query->bind_param('ssssssssss', $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10);

            if($query->execute()){
                $query->close();

                parent::returnConnection()->close();

                return array(true, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10);
            }else {
                return array(false, $fields, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10);
            }

        }

        public static function saveNavigationLink($tbl, $fields, $value1, $value2, $value3, $value4, $value5)
        {
            parent::checkConnection();

            $query = parent::returnConnection()->prepare("INSERT INTO `$tbl` $fields VALUES (?,?,?,?,?)");

            $query->bind_param('sssss', $value1, $value2, $value3, $value4, $value5);

            if($query->execute()){
                $query->close();

                parent::returnConnection()->close();

                return array(true, $value1, $value2, $value3, $value4);
            }else {
                return array(false, $fields, $value1, $value2, $value3, $value4);
            }

        }


        // $values = array();
        // ** must be equal
        // $fields = (foo,bar,book)
        // $tempval = (?,?,?)
        public static function createEntry($tbl, $fields, $values, $type, $input_values)
        {
            parent::checkConnection();

            // $a_params = array();

            // $num_of_inputs = 0;
            // $bind_params = set_bind_parameters($values, 'bind', 's');
            // $valuesQuery = set_bind_parameters($values, 'values','?');

            $query = parent::returnConnection()->prepare("INSERT INTO $tbl $fields VALUES (?,?,?,?,?,?,?,?,?,?,?)");


            $query->bind_param('sssssssssss', $input_values[0], $input_values[1], $input_values[2], $input_values[3], $input_values[4], $input_values[5], $input_values[6], $input_values[7], $input_values[8], $input_values[9], $input_values[10]);

            $query->execute();

            $query->close();

            parent::returnConnection()->close();

            return array(true, $input_values[0], $input_values[1], $input_values[2], $input_values[3], $input_values[4], $input_values[5], $input_values[6], $input_values[7], $input_values[8], $input_values[9], $input_values[10]);

            // $dummyQuery = "INSERT INTO $tbl $fields VALUES $valuesQuery";
            //
            // $ret = json_encode(array($bind_params, $valuesQuery, $dummyQuery, $inputsQuery));
            //
            // exit($ret);

        }

    }
