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

	function get_limited_blog_posts($fields, $tbl, $field2, $arg, $limit){

		// Connect::checkConnection();

		$posts = DatabaseFunctions::getDataLimit($fields, $tbl, $field2, $arg, true, $limit);

		if ($posts[0]) {
			return array(true, $posts[1]);
		}else {
			return array(false);
		}
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

        return array($readable_date, $time, $date_now, $month, $weekday, $month_digit, $timestamp);
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

	function generatecookieToken($length, $email, $name, $id, $address, $stripe_cus_id){
		Connect::checkConnection();
		$con = Connect::returnConnection();

		$cookieCode = bin2hex(random_bytes($length));

        // sessions are set here temporarily to be used to set cookie in external script
		// $_SESSION['idyl_tkn'] = $cookieCode;
		// $_SESSION['idyl_unm'] = $name;
		// $_SESSION['idyl_qni'] = $id;
		// $_SESSION['idyl_uem'] = $email;

		// 30 days cookies are active for
		setcookie('idyl_tkn', $cookieCode, time() + 86400, "/");
		setcookie('idyl_unm', $name, time() + 86400, "/");
		setcookie('idyl_qni', $id, time() + 86400, "/");
		setcookie('idyl_str_id', $stripe_cus_id, time() + 86400, "/");
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

	function getProductNavCategories(){

		Connect::checkConnection();

		$dynamic_categories_data = DatabaseFunctions::getDataLimit('*', 'navigation', 'nav_is_cat', 'yes', false, false);
	    $dynamic_categories = array();

	    if ($dynamic_categories_data[0]) {
	        $dynamic_categories_data = $dynamic_categories_data[1];
	    }

	    for ($dy=0; $dy < count($dynamic_categories_data); $dy++) {
	        // check if link is active
	        if ($dynamic_categories_data[$dy]['nav_status'] === 'true') {
				$parsed_json = json_decode( $dynamic_categories_data[$dy]['nav_json_data'], true );

				$send = array(
					'title'=>$dynamic_categories_data[$dy]['nav_title'],
					'slug'=> $parsed_json['slug']
				);

	            array_push($dynamic_categories, $send);
	        }
	    }

		return $dynamic_categories;
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

	function validate_sku($id){

		// \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

        try {
            $sku = \Stripe\Sku::retrieve($id);

            $msg = array(
                'status'=> array(
					'code'=>101,
					'code_status'=>'success'
				),
                'sku_attributes'=> $sku['attributes'],
				'sku_inventory'=>$sku['inventory'],
				'sku_image'=> $sku['image']
            );

			return $msg;

        } catch(Stripe_CardError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];

            $error1 = $body['error']['type'];


            $msg = array(
                'status'=> array(
					'code'=>404,
					'code_status'=>'error'
				),
                'error_type'=> $error1
            );

            return $msg;

        } catch (Stripe_InvalidRequestError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
              // Invalid parameters were supplied to Stripe's API
              $error2 = $body['error']['type'];

              $msg = array(
                  'status'=> array(
  					'code'=>404,
  					'code_status'=>'error'
  				),
                  'error_type'=> $error2
              );

              return $msg;

        } catch (Stripe_AuthenticationError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Authentication with Stripe's API failed
          $error3 = $body['error']['type'];

          $msg = array(
              'status'=> array(
				  'code'=>404,
				  'code_status'=>'error'
			  ),
              'error_type'=> $error3
          );

          return $msg;

        } catch (Stripe_ApiConnectionError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Network communication with Stripe failed
          $error4 = $body['error']['type'];

          $msg = array(
              'status'=> array(
				  'code'=>404,
				  'code_status'=>'error'
			  ),
              'error_type'=> $error4
          );

          return $msg;

        } catch (Stripe_Error $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Display a very generic error to the user, and maybe send
          // yourself an email
          $error5 = $body['error']['type'];

          $msg = array(
              'status'=> array(
				  'code'=>404,
				  'code_status'=>'error'
			  ),
              'error_type'=> $error5
          );

          return $msg;


        } catch (Exception $e) {
            // var_dump($body);

          // Something else happened, completely unrelated to Stripe
          $msg = array(
              'status'=> array(
				  'code'=>402,
				  'code_status'=>'error'
			  ),
              'error_type'=> 'error with request made. Check SKU'
          );

          return $msg;

      }
	}

	function get_products($amount){
		// get products from stripe api
        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        // \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        try {
            // $products_all = \Stripe\Product::retrieve("prod_CDME1dinY2YyTr");
            $products_all = \Stripe\Product::all(array(
                "limit" => $amount
            ));

            // for ($i=0; $i < count($products_all['data']); $i++) {
                //     echo $products_all['data'][$i]['id']."<br>";
                //     echo $products_all['data'][$i]['name']."<br>";
                //     echo $products_all['data'][$i]['skus']['data'][$i]['id']."<br>";
                //     echo "<br>";
                // }

            // // // / / / /// /// // // // // // // //

            $msg = array(
                'status'=> 'success',
                'product'=> $products_all['data']
            );

			return $msg;

        } catch(Stripe_CardError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];

            $error1 = $body['error']['type'];


            $msg = array(
                'status'=> 'error',
                'product'=> $error1
            );

            return $msg;

        } catch (Stripe_InvalidRequestError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
              // Invalid parameters were supplied to Stripe's API
              $error2 = $body['error']['type'];

              $msg = array(
                  'status'=> 'error',
                  'product'=> $error2
              );

              return $msg;

        } catch (Stripe_AuthenticationError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Authentication with Stripe's API failed
          $error3 = $body['error']['type'];

          $msg = array(
              'status'=> 'error',
              'product'=> $error3
          );

          return $msg;

        } catch (Stripe_ApiConnectionError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Network communication with Stripe failed
          $error4 = $body['error']['type'];

          $msg = array(
              'status'=> 'error',
              'product'=> $error4
          );

          return $msg;

        } catch (Stripe_Error $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Display a very generic error to the user, and maybe send
          // yourself an email
          $error5 = $body['error']['type'];

          $msg = array(
              'status'=> 'error',
              'product'=> $error5
          );

          return $msg;


        } catch (Exception $e) {
            $body = $e->getJsonBody();
            // var_dump($body);
          // Something else happened, completely unrelated to Stripe
          $error6 = $body['error']['type'];
          $err_msg =  $body['error']['message'];

          $msg = array(
              'status'=> 'error',
              'error_type'=> $error6,
              'error_msg'=> $err_msg
          );

          return $msg;

      }

	}

	function send_receipt($charge, $email){

		try {

			\Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
			$customer_charge = \Stripe\Charge::retrieve($charge);

			$customer_charge->receipt_email = $email;
			$customer_charge->save();

			return array(true, $customer_charge);

		} catch(Stripe_CardError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];

            $error1 = $body['error']['type'];


            $msg = array(
                'status'=> array(
                    'code'=>404,
                    'code_status'=>'error',
                    'type'=> $error1
                )
            );

            return array(false, $msg);
            // var_dump($msg);

        } catch (Stripe_InvalidRequestError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
              // Invalid parameters were supplied to Stripe's API
              $error2 = $body['error']['type'];

              $msg = array(
                  'status'=> array(
                      'code'=>404,
                      'code_status'=>'error',
                      'type'=> $error2
                  )
              );

              return array(false, $msg);
              // var_dump($msg);

        } catch (Stripe_AuthenticationError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Authentication with Stripe's API failed
          $error3 = $body['error']['type'];

          $msg = array(
              'status'=> array(
                  'code'=>404,
                  'code_status'=>'error',
                  'type'=> $error3
              )
          );

          return array(false, $msg);
          // var_dump($msg);

        } catch (Stripe_ApiConnectionError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Network communication with Stripe failed
          $error4 = $body['error']['type'];

          $msg = array(
              'status'=> array(
                  'code'=>404,
                  'code_status'=>'error',
                  'type'=> $error4
              )
          );

          return array(false, $msg);
          // var_dump($msg);

        } catch (Stripe_Error $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Display a very generic error to the user, and maybe send
          // yourself an email
          $error5 = $body['error']['type'];

          $msg = array(
              'status'=> array(
                  'code'=>404,
                  'code_status'=>'error',
                  'type'=> $error5
              )
          );

          return array(false, $msg);
          // var_dump($msg);

        } catch (Exception $e) {
            $body = $e->getJsonBody();
            // var_dump($body);
          // Something else happened, completely unrelated to Stripe
          $error6 = $body['error']['type'];
          $err_msg =  $body['error']['message'];

          $msg = array(
              'status'=> array(
                  'code'=>404,
                  'code_status'=>'error',
                  'type'=> $error6,
                  'msg'=> $err_msg
              )
          );

         return array(false, $msg);
          // var_dump($msg);
          // header('location: /products');

      }


	}

	function getSkuData($products)
	{
		$skus = array();
		$names = array();

		for ($i=0; $i < count($products); $i++) {
			for ($j=0; $j < count($products[$i]['skus']['data']); $j++) {
				if ($products[$i]['id'] === $products[$i]['skus']['data'][$j]['product']) {
					$connect_array = array(
						'id'=> $products[$i]['id'],
						'name'=>$products[$i]['name'],
						'slug'=>$products[$i]['metadata']['slug']
					);

					array_push($names, $connect_array);
				}

				array_push($skus, $products[$i]['skus']['data'][$j]);
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
