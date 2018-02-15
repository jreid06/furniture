<?php

	function verifyPassword($password_entered, $password_database)
	{
		if (password_verify($password_entered,$password_database)) {
			return true;
		}else {
			return false;
		}
	}


    function object_to_array($object) {
        return (array) $object;
    }

    function generate_current_date()
    {
        $current_date = getdate();
        $timestamp = $current_date[0];
        $month_digit = $current_date['mon'];

        $readable_date = date('d/m/Y H:i:s', $timestamp);
        $time = date('H:i:s', $timestamp);
        $date_now = date('m/d/Y', $timestamp);
        $month = $current_date['month'];
        $weekday = $current_date['weekday'];

        return array($readable_date, $time, $date_now, $month, $weekday, $month_digit);
    }

    function add_size_suffix($size_length, $img_size)
    {
        if ($size_length === 5) {
            # KB e.g 47kb
            return round($img_size, 1) . "KB";
        } elseif($size_length === 6){
            # KB e.g 577kb
            return round($img_size, 1) . "KB";
        }elseif ($size_length === 7) {
            # MB
            return round($img_size, 1) . "MB";
        }
    }


	function checkEmail($con, $email, $table){
		// echo "checkEmail runs";
		$query = "SELECT email FROM $table WHERE email = '$email'";
		$result = $con->query($query);

		// use num rows function to check if any rows are returned
		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	// function was used to update a password that wasnt hashed when adding manually // NOTE function no longer needed
	function updatePassword($con, $pass1)
	{
		$pass = password_hash($pass1, PASSWORD_DEFAULT);
		$query = "UPDATE users SET password='$pass' WHERE id=6";

		$con->query($query);
		$con->close();
	}

	function generatecookieToken($length, $email, $name, $id, $address){
		Connect::checkConnection();
		$con = Connect::returnConnection();

		$cookieCode = bin2hex(random_bytes($length));

        // sessions are set here temporarily to be used to set cookie in external script
		// $_SESSION['idyl_tkn'] = $cookieCode;
		// $_SESSION['idyl_unm'] = $name;
		// $_SESSION['idyl_qni'] = $id;
		// $_SESSION['idyl_uem'] = $email;

		setcookie('idyl_tkn', $cookieCode, time() + 86400, "/");
		setcookie('idyl_unm', $name, time() + 86400, "/");
		setcookie('idyl_qni', $id, time() + 86400, "/");
		setcookie('idyl_uem', $email, time() + 86400, "/");
		setcookie('idyl_uaddrs', $address, time() + 86400, "/");

		// echo "\n COOKIE CREATED \n ";
		// prepare query and the table for values to be inserted as a statement
		$stmt = $con->prepare("INSERT into cookietable (cookieID, cus_id, cus_email) VALUES (?, ?, ?)");
        //
		// // bind paremeters to the insert statement in order of the fields specified above
		$stmt->bind_param('sss', $cookieCode, $id, $email);
        //
		// /* execute prepared statement */
		$stmt->execute();
        //
		// /* close statement and connection */
		$stmt->close();

		return true;

	}

	function format_timestamp($timestamp){
	    $ts = $timestamp;
	    $date = new DateTime();

	    $date->setTimestamp($ts);
	    $year = $date->format('Y');
	    $time = $date->format('H:i:s');

	    $timeArray = array(
	        'year'=> $date->format('Y'),
	        'month'=> $date->format('m'),
	        'day'=> $date->format('d'),
	        'time'=> $date->format('H:i:s'),
			'full_date'=>$date->format('d-m-Y')
	    );

	    return $timeArray;
	}

	function getSkuData($products)
	{
		$skus = array();
		$names = array();

		for ($i=0; $i < count($products['data']); $i++) {
			for ($j=0; $j < count($products['data'][$i]['skus']['data']); $j++) {
				if ($products['data'][$i]['id'] === $products['data'][$i]['skus']['data'][$j]['product']) {
					$connect_array = array(
						'id'=> $products['data'][$i]['id'],
						'name'=>$products['data'][$i]['name'],
						'slug'=>$products['data'][$i]['metadata']['slug']
					);

					array_push($names, $connect_array);
				}

				array_push($skus, $products['data'][$i]['skus']['data'][$j]);
			}
		}

		for ($j=0; $j < count($skus); $j++) {
			for ($k=0; $k < count($names); $k++) {
				if ($skus[$j]['product'] === $names[$k]['id']) {
					$skus[$j]['prod_name'] = $names[$k]['name'];
					$skus[$j]['prod_slug'] = $names[$k]['slug'];
				}
			}
		}

		return $skus;
	}


	// function generateSessionToken($length, $email, $name, $status, $con){
	// 	$cookieCode = bin2hex(random_bytes($length));
	// 	$_SESSION['tkn'] = $cookieCode;
	// 	$_SESSION['name'] = $name;
	// 	// prepare query and the table for values to be inserted as a statement
	// 	$stmt = $con->prepare("INSERT into cookielogin (cookieID, cmail, cname) VALUES (?, ?, ?, ?)");
	//
	// 	// bind paremeters to the insert statement in order of the fields specified above
	// 	$stmt->bind_param('sss', $cookieCode, $email, $name, $status);
	//
	// 	/* execute prepared statement */
	// 	$stmt->execute();
	//
	// 	/* close statement and connection */
	// 	$stmt->close();
	//
	// 	// return $cookieCode;
	// }



	// function is used to check if user has a token already created in the database related to their user. If it returns true then user exists so use their pre-exsisting info e.g name & email
	function compareTokens($token, $con){
		$getToken = "SELECT cookieID, cmail, cname FROM cookielogin WHERE cookieID = '$token'";
		// echo $token;
		$result = $con->query($getToken);
		// var_dump($result);
		if ($result->num_rows > 0) {
			// echo "MORE THAN 1 ROW <br>";
			$values = $result->fetch_assoc();
			if (hash_equals($values['cookieID'], $token)) {
				// print_r($values);
				return [true, $values];
			}
		}
		else {
			echo "<br> No rows with that value";
			return false;
		}
	}
 ?>
