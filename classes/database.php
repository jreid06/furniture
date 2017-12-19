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
                if (!$result) {
                    return false;
                }
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }

                return $data;
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
                return $result;
            } else {
                return false;
            }
        }

        public static function getGalleryImages($tbl, $fields, $ordField, $sortOrder, $limit=false, $offset=false)
        {
            parent::checkConnection();
            if ($limit && !$offset) {
                $query = "SELECT $fields FROM $tbl ORDER BY $ordField $sortOrder LIMIT $limit";

                $result = parent::returnConnection()->query($query);

                // this will update images array with all rows returned from query
                while ($row = $result->fetch_assoc()) {
                    $images[] = $row;
                }

                parent::returnConnection()->close();
                // return array($images, 'first IF');
                return $images;
            }else if ($limit && $offset) {

                $query = "SELECT $fields FROM $tbl ORDER BY $ordField $sortOrder LIMIT $limit OFFSET $offset";

                $result = parent::returnConnection()->query($query);

                while ($row = $result->fetch_assoc()) {
                    $images[] = $row;
                }

                parent::returnConnection()->close();
                return array($images, 'SECOND IF');
            }
        }

        public static function getOrderedData($fields, $tbl, $orderOption, $sortorder)
        {
            $query = "SELECT $fields FROM $tbl ORDER BY $orderOption $sortorder";
            $result = parent::returnConnection()->query($query);

            while ($row = $result->fetch_assoc()) {
                $galleryImages[] = $row;
            }

            return $galleryImages;
        }

        public static function deleteInfo($tbl, $value)
        {
            $query = "DELETE FROM $tbl WHERE id='$value'";

            if (parent::returnConnection()->query($query)) {
                $result = array('777','Image data deleted from successfully', true);
                return $result;
            } else {
                $result = array('222','ERROR deleting image data from database', false);
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

        public static function updateMultipleFields($tbl,$fields, $values, $field2, $value2, $usersUpdate)
        {
			$setString = '';

            if ($usersUpdate) {
                for ($i=0; $i < count($fields); $i++) {
    				if ($i === count($fields)-1) {
    					$setString .= "$fields[$i]='$values[$i]'";
    				}else {
    					$setString .= "$fields[$i]='$values[$i]',";
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
                return true;
            } else {
                return false;
            }
        }

        public static function updateDatabase($fields, $tbl, $field2, $value, $value2, $ckcode)
        {
            $query = "UPDATE $tbl SET $fields='$value' WHERE $field2='$value2'";
            $res = parent::returnConnection()->query($query);

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

        public static function getDetails($email)
        {
            $query = "SELECT firstName, password, role FROM users WHERE email='$email'";
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
            $query = "SELECT email FROM users WHERE email='$email'";

            $result = parent::returnConnection()->query($query);

            if ($result->num_rows > 0) {
                return true;
            } else {
                false;
            }
        }

        public static function getUserEmails()
        {
            $query = "SELECT email FROM test";
            $emailList = parent::returnConnection()->query($query);

            /* NOTES-- dont fetch_assoc here as when we want to print out results it will only display 1 value */

            return $emailList;
        }

        public static function getSlideInfo()
        {
            $sql = "SELECT slides.id, posts.title, posts.description ,images.image_address, categories.catName\n"

    . "FROM posts\n"

    . "INNER JOIN slides ON posts.id = slides.post_id\n"

    . "INNER JOIN images ON posts.img_id = images.id\n"

    . "INNER JOIN categories ON posts.cat_id = categories.id\n"

    . "ORDER BY slides.id";

            parent::checkConnection();
            $result = parent::returnConnection()->query($sql);
            // var_dump($result);
            // $result1 = $result->fetch_assoc();
            // var_dump($arr);
            if ($result->num_rows > 0) {

                // allows us to return multiple values
                // iterate through array until no rows left to obtain
                while ($row = $result->fetch_assoc()) {
                    $slides[] = $row;
                }

                return $slides;
            } else {
                return "error with request. Reload page";
            }
        }

        public static function getDummyNews()
        {
            $query = "SELECT posts.id, posts.title, posts.description, posts.date, images.image_address, categories.catName \n"

    . "FROM posts \n"

    . "INNER JOIN images ON posts.img_id = images.id \n"

    . "INNER JOIN categories ON posts.cat_id = categories.id \n"

    . "WHERE posts.id=6\n"

    . "ORDER BY posts.date";


            $result = Parent::returnConnection()->query($query);

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return json_decode([false, "error with request"]);
            }
        }

		// function is used when user logs out. it deletes cookie an/or session variables.
        public static function deleteData()
        {
            // checks to see if user name is set and if tkn is not set
            // this is set if user updates name and has not clicked remember me when logging in
            if (isset($_COOKIE['_unm']) && !isset($_COOKIE['tkn'])) {
                setcookie('_unm', "", time() - 86400, "/");
            }


            if (isset($_COOKIE['tkn']) && isset($_COOKIE['_unm']) && isset($_COOKIE['_qni'])) {
                setcookie('tkn', "", time() - 86400, "/");
                setcookie('_unm', "", time() - 86400, "/");
                setcookie('_uem', "", time() - 86400, "/");
                // echo "cookies deleted <br>";

                $qni = $_COOKIE['_qni'];
                $deleteQuery = "DELETE FROM cookielogin WHERE cus_id='$qni'";
                Connect::checkConnection();
                if (Connect::returnConnection()->query($deleteQuery)) {
                    Connect::returnConnection()->close();
                }
                setcookie('_qni', "", time() - 86400, "/");
                echo json_encode(array("C-DELETED","cookies deleted"));
            } elseif (isset($_SESSION)) {
                session_unset();
                session_destroy();

                // header('location: /');
                echo json_encode(array("S-DELETED","sessions deleted"));
            } else {
                echo "NOTHING works";
            }
        }

        public static function createUser($tbl, $value1, $value2, $value3, $value4, $value5, $value6)
        {
            $query = parent::returnConnection()->prepare("INSERT INTO $tbl (firstName, lastName, email, age, role, password) VALUES (?,?,?,?,?,?)");

            $query->bind_param("ssssss", $value1, $value2, $value3, $value4, $value5, $value6);

            $value6 = password_hash($value6, PASSWORD_DEFAULT);

            $query->execute();

            $query->close();
            parent::returnConnection()->close();

            return "User Created Successfully";
        }

        public static function addGalleryImages($tbl, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9)
        {
            $query = parent::returnConnection()->prepare("INSERT INTO $tbl (imgAddress, imgAlt, imgDesc, img_size, uploadedBy, dateDay, date_hisTime, date_month, date_weekday) VALUES (?,?,?,?,?,?,?,?,?)");

            $query->bind_param("sssssssss", $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9);

            // $value6 = password_hash($value6, PASSWORD_DEFAULT);

            $query->execute();

            $query->close();
            parent::returnConnection()->close();

            // return "User Created Successfully";
        }

        public static function addData($tbl, $value1, $value2)
        {
            $query = parent::returnConnection()->prepare("INSERT INTO $tbl (image_address, cat_id) VALUES (?,?)");

            $query->bind_param('ss',$value1, $value2);
            $query->execute();

            $query->close();

            parent::returnConnection()->close();

            return true;

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
