<?php
include 'dbconnect.php';

\Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
\EasyPost\EasyPost::setApiKey("GApzToQ5BwOn9YlJ05H8iQ");

if (isset($_POST['token'])) {
	$token = $_POST['token'];
	$order_id = $_POST['order'];
	$ep_order_id = $_POST['easypost'];
	$customer_id_session = false;

	if (isset($_SESSION['idyl_qni'])) {
		$customer_id_session = $_SESSION['idyl_qni'];
	}
	elseif (isset($_COOKIE['idyl_qni'])) {
		$customer_id_session = $_COOKIE['idyl_qni'];
	}

	// $customer_id_cookie = isset($_COOKIE['idyl_qni'])?$_COOKIE['idyl_qni']:false;
	// retrieve the correct order to be paid

	try {
		$order = \Stripe\Order::retrieve($order_id);
	}

	catch(Stripe_InvalidRequestError $e) {
		$body = $e->getJsonBody();
		$err = $body['error'];

		// Invalid parameters were supplied to Stripe's API

		$error2 = $body['error']['type'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error2
			)
		);
		exit(json_encode($msg));

		// var_dump($msg);

	}

	catch(Stripe_AuthenticationError $e) {
		$body = $e->getJsonBody();
		$err = $body['error'];

		// Authentication with Stripe's API failed

		$error3 = $body['error']['type'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error3
			)
		);
		exit(json_encode($msg));

		// var_dump($msg);

	}

	catch(Stripe_ApiConnectionError $e) {
		$body = $e->getJsonBody();
		$err = $body['error'];

		// Network communication with Stripe failed

		$error4 = $body['error']['type'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error4
			)
		);
		exit(json_encode($msg));

		// var_dump($msg);

	}

	catch(Stripe_Error $e) {
		$body = $e->getJsonBody();
		$err = $body['error'];

		// Display a very generic error to the user, and maybe send
		// yourself an email

		$error5 = $body['error']['type'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error5
			)
		);
		exit(json_encode($msg));

		// var_dump($msg);

	}

	catch(Exception $e) {
		$body = $e->getJsonBody();

		// var_dump($body);
		// Something else happened, completely unrelated to Stripe

		$error6 = $body['error']['type'];
		$err_msg = $body['error']['message'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error6,
				'msg' => $err_msg
			)
		);
		exit(json_encode($msg));
	}

	// create the charge

	try {

		$order->pay(array(
			"source" => $token, // obtained with Stripe.js
			"email" => $order['email']
		));

		// if order payment is successful then pay the for shipment

		if ($order['status'] == 'paid') {

			// pay for order and update database with order details for customer if logged in

			$update_status = false;
			if ($customer_id_session) {
				$order_json = json_encode($order);
				$result = DatabaseFunctions::addOrderData('orders', '(stripe_id, cus_id, order_json)', $order['id'], $customer_id_session, $order_json);
				if ($result) {
					$update_status = 'successfully saved in database';
				}
				else {
					$update_status = 'order not successfully saved in database';
				}

				// stripe customer address from order
			}

			// from address is declared in dbconnect.php

		}
		else {
			$msg = array(
				'status' => array(
					'code' => 404,
					'code_status' => 'error'
				) ,
				'data' => array(
					'msg' => 'order not paid successfully. contact help'
				)
			);
			exit(json_encode($msg));
		}
	}

	catch(Stripe_InvalidRequestError $e) {
		$body = $e->getJsonBody();
		$err = $body['error'];

		// Invalid parameters were supplied to Stripe's API

		$error2 = $body['error']['type'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error2
			)
		);
		exit(json_encode($msg));

		// var_dump($msg);

	}

	catch(Stripe_AuthenticationError $e) {
		$body = $e->getJsonBody();
		$err = $body['error'];

		// Authentication with Stripe's API failed

		$error3 = $body['error']['type'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error3
			)
		);
		exit(json_encode($msg));

		// var_dump($msg);

	}

	catch(Stripe_ApiConnectionError $e) {
		$body = $e->getJsonBody();
		$err = $body['error'];

		// Network communication with Stripe failed

		$error4 = $body['error']['type'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error4
			)
		);
		exit(json_encode($msg));

		// var_dump($msg);

	}

	catch(Stripe_Error $e) {
		$body = $e->getJsonBody();
		$err = $body['error'];

		// Display a very generic error to the user, and maybe send
		// yourself an email

		$error5 = $body['error']['type'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error5
			)
		);
		exit(json_encode($msg));

		// var_dump($msg);

	}

	catch(Exception $e) {
		$body = $e->getJsonBody();

		// var_dump($body);
		// Something else happened, completely unrelated to Stripe

		$error6 = $body['error']['type'];
		$err_msg = $body['error']['message'];
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error',
				'type' => $error6,
				'msg' => $err_msg
			)
		);
		exit(json_encode($msg));
	}

	try {
        $easypost_order = \EasyPost\Order::retrieve($ep_order_id);
	}
	catch(\EasyPost\Error $e) {
		$easypost_error = $e->ecode;
		$shipment = false;
		$msg = array(
			'status' => array(
				'code' => 101,
				'code_status' => 'warn'
			) ,
			'data' => array(
				'msg' => 'order successfully paid. shipping details error',
				'final_order' => $order,
				'easy_post_error' => $easypost_error,
				'shippment_details' => $shipment
			)
		);
		exit(json_encode($msg));
	}

	try {
		$easypost_order->buy(array('carrier' => $order['metadata']['chosen_carrier'], 'service' => $order['metadata']['chosen_service']));

		// UPDATE order will tracking information
		// shipping info
		// $order->shipping['carrier'] = $easypost_order['shipments'][0]['selected_rate']['carrier'];

		// metadata
		$order->metadata['easypost-order-id'] = $easypost_order['id'];

		// update order with tracking information
		for ($k=0; $k < count($easypost_order['shipments']); $k++) {
		    $dynamic_key1 = 'tracking-'.($k+1);
		    $dynamic_key2 = 'postagelabel-'.($k+1);
		    $dynamic_key3 = 'shipment-id-'.($k+1);

		    $order->metadata[$dynamic_key3] = $easypost_order['shipments'][$k]['id'];
		    $order->metadata[$dynamic_key1] = $easypost_order['shipments'][$k]['tracking_code'];
		    $order->metadata[$dynamic_key2] = $easypost_order['shipments'][$k]['postage_label']['label_url'];

		}

		$order->save();

		$easypost_error = false;
		$msg = array(
			'status' => array(
				'code' => 101,
				'code_status' => 'success'
			) ,
			'data' => array(
				'msg' => 'order successfully paid. with shipping',
				'databse_status' => $update_status,
				'final_order' => $order,
				'easy_post_error' => $easypost_error,
				// 'shippment_details' => (string) $easypost_order,
				'receipt_status' => true
			)
		);

		exit(json_encode($msg));
	} catch (\EasyPost\Error $e) {
		$easypost_error = $e->ecode;
		$msg = array(
			'status' => array(
				'code' => 404,
				'code_status' => 'error'
			) ,
			'data' => array(
				'easy_post_error'=> $easypost_error = $e->ecode,
				'msg' => 'error with supplying shipping confirmation. contact us for more help'
			)
		);
		exit(json_encode($msg));
	}

}
else {
	$msg = array(
		'status' => array(
			'code' => 404,
			'code_status' => 'error'
		) ,
		'data' => array(
			'msg' => 'error with payment. Token not valid or doesnt exist. Contact help'
		)
	);
	exit(json_encode($msg));
}

?>
