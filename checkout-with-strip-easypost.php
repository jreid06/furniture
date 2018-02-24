<?php

    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';

    // transaction token. only lasts for 1 hour
    if (!isset($_COOKIE['trans_local_token'])) {
        // "redirect away to basket";
        header('location: /basket');
    }else {
         // echo "checkout payment cookie is set for 1 hour";
    }

    // var_dump($_SESSION);

    if (isset($_GET['q']) && $_GET['q'] === 'guest') {
        $logged_in_status = false;

        // checking if user has logged in on another tab. if true redirect them to logged in checkout page
        if (isset($_SESSION['idyl_tkn']) || isset($_COOKIE['idyl_tkn'])) {
            $cus_id = isset($_SESSION['idyl_str_id'])?$_SESSION['idyl_str_id']:$_COOKIE['idyl_str_id'];
            header("location: /checkout/user/$cus_id");
        }

    }elseif (isset($_GET['q']) && $_GET['q'] === 'user') {

        // checking if user may have logged out in another tab. if true the user will redirected to checkout as a guest // only does check if page is efreshed again
        if (!isset($_SESSION['idyl_tkn']) && !isset($_COOKIE['idyl_tkn'])) {
            header("location: /checkout/guest");
        }

        $logged_in_status = true;
        $cus_email = isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];

        $user_details = DatabaseFunctions::getData('*','customers','email', $cus_email)[1];
        $user_addresses = $user_details['address'];
        $user_addresses = json_decode($user_addresses, true);

        $user_basket_info = DatabaseFunctions::getData('products', 'basket', 'customer_id', $user_details['cus_id'])[1];
        $user_basket_info = json_decode( $user_basket_info['products'], true);

        // create session with basket info
        // $_SESSION['basket_data'] = json_encode($user_basket_info);

        $user_active_address = array();

        // get the active address from all user addresses
        for ($i=0; $i < count($user_addresses); $i++) {
            if ($user_addresses[$i]['status']) {
                array_push($user_active_address, $user_addresses[$i]);
            }
        }

    }else {
        header('location: /basket');
        die();
    }

    include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';

?>



<div class="container-fluid home checkout-home" data-status="<?php if (!$logged_in_status): ?>false <?php else: ?>true<?php endif; ?>" data-in="<?php if (!$logged_in_status): ?>false<?php else: ?>true<?php endif; ?>">
    <div class="row">

        <?php if (!$logged_in_status): ?>
            <div class="col-12 col-md-7 guest-form form-details-column">
                <form id="checkout-form-guest">
                   <div class="form-row">
                      <div class="col-md-6 mb-3">
                         <label for="validationDefault01">First name</label>
                         <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                      </div>
                      <div class="col-md-6 mb-3">
                         <label for="validationDefault02">Last name</label>
                         <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
                      </div>
                      <div class="col-md-6 mb-3">
                         <label for="validationDefaultUsername">Username</label>
                         <div class="input-group">
                            <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            </div>
                            <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                         </div>
                      </div>
                      <div class="form-group">
                          <label for="inputDateUpdate">D.O.B</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="inputGroupPrepend2">@</span>
                              </div>
                              <input type="date" class="form-control" id="inputDateUpdate" value="" required>
                          </div>

                      </div>
                   </div>
                   <div class="form-row">
                      <div class="col-md-6 mb-3">
                         <label for="validationDefault03">City</label>
                         <input type="text" class="form-control" id="validationDefault03" placeholder="City" required>
                      </div>
                      <div class="col-md-3 mb-3">
                         <label for="validationDefault04">State</label>
                         <input type="text" class="form-control" id="validationDefault04" placeholder="State" required>
                      </div>
                      <div class="col-md-3 mb-3">
                         <label for="validationDefault05">Zip</label>
                         <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
                      </div>
                   </div>
                   <button class="btn btn-primary" type="submit" @click="save-purcahse-details">SAVE</button>
                </form>
            </div>

        <?php else: ?>

            <div class="col-12 col-md-7 user-form form-details-column" data-status="true">
                <div class="row">
                    <div class="col-12">
                        <!-- user logged in details -->
                        <div class="card details-card" style="width: 100%">
                          <div class="card-body">
                            <h5 class="card-title">Your Details</h5>
                            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            <div class="table-responsive">
                              <table class="table loggedin-checkout-table">
                                 <tbody>
                                     <tr>
                                         <td>Title</td>
                                         <td><?=$user_details['title'];?></td>
                                     </tr>
                                     <tr>
                                         <td>Name</td>
                                         <td><?=$user_details['fname'];?> <?=$user_details['lname'];?></td>
                                     </tr>
                                     <tr>
                                         <td>Email</td>
                                         <td><?=$user_details['email'];?></td>
                                     </tr>
                                 </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

                        <hr class="d-md-none">
                        <!-- user active address details -->
                    </div>

                    <div class="col-12">
                        <div class="card details-card" style="width: 100%">
                          <div class="card-body">
                            <h5 class="card-title">Delivery Address</h5>

                            <div class="table-responsive">
                              <table class="table loggedin-checkout-table">
                                 <tbody>
                                     <tr>
                                         <td>Address Line 1</td>
                                         <td><?=$user_active_address[0]['address1']; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Address Line 2</td>
                                         <td>
                                             <?php
                                             if ($user_active_address[0]['address2'] === 'false') {
                                                 echo 'N/A';
                                             }else {
                                                 echo $user_active_address[0]['address2'];
                                             }

                                            ?>
                                        </td>
                                     </tr>
                                     <tr>
                                         <td>City</td>
                                         <td><?=$user_active_address[0]['city_town']; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Post Code</td>
                                         <td><?=$user_active_address[0]['post_code']; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Country</td>
                                         <td><?=$user_active_address[0]['country']; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Contact Num</td>
                                         <td><?=$user_active_address[0]['phone_num']; ?></td>
                                     </tr>
                                 </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>

        <?php endif; ?>


        <div class="col-12 col-md-5">
            <div class="row">

                <div class="col-12 basket-listing">

                    <div class="row">
                        <div class="col-12 item-column">
                            <template v-for="(item, index) in basket.items">
                                <div class="basket-item-checkout d-flex flex-wrap flex-row">
                                    <div class="p-2 item-image">
                                        <img :src="item.prod_image" :alt="item.prod_desc">
                                    </div>
                                    <div class="p-2 item-details">
                                        <h6>{{item.prod_name}} <br> {{capitalizeFirstLetter(item.prod_tags.color)}} - {{capitalizeFirstLetter(item.prod_tags.size)}}</h6>
                                    </div>
                                    <div class="p-2 item-details">
                                        <p>{{item.quantity}}</p>
                                    </div>
                                    <div class="p-2 item-total-price">
                                        <h6>£{{item.total_price}}</h6>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="col-12" style="text-align: center">
                            <a class="btn btn-primary checkout-edit-btn" href="/basket">Edit Basket</a>
                            <div class="table-responsive">
                              <table class="table loggedin-checkout-table">
                                 <tbody>
                                     <tr>
                                         <td>Subtotal</td>
                                         <td class="price-td">£ {{basketTotal.toFixed(2)}}</td>
                                     </tr>
                                 </tbody>
                              </table>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-12 paynow">
                    <?php if ($logged_in_status): ?>

                            <?php
                                # create a new order and update the session variable "order_id"
                                $item_array = array();
                                $sku_items = array();

                                 \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

                                for ($item=0; $item < count($user_basket_info); $item++) {
                                    $ord_item = new Orderitem('sku', $user_basket_info[$item]['stripesku_id'], $user_basket_info[$item]['quantity']);

                                    // cast object to assosiative array and push into item array
                                    array_push($item_array, (array) $ord_item);

                                    // get sku data
                                    $sku_item = \Stripe\SKU::retrieve($user_basket_info[$item]['stripesku_id']);

                                    array_push($sku_items, $sku_item);

                                }



                                try {
                                  // Use Stripe's library to make requests...

                                  // create order
                                  // \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
                                  $order = \Stripe\Order::create(array(
                                      "items" => $item_array,
                                      "currency" => "gbp",
                                      "customer" => $user_details['stripe_cus_id'],
                                      "shipping" => array(
                                          "name" => $user_details['fname']." ".$user_details['lname'],
                                          "address" => array(
                                              "line1" => $user_active_address[0]['address1'],
                                              "line2" => $user_active_address[0]['address2']==='false'?'N/A':$user_active_address[0]['address1'],
                                              "city" => $user_active_address[0]['city_town'],
                                              "country" => "UK",
                                              "postal_code" => $user_active_address[0]['post_code']
                                          )
                                    ),
                                    "email" => $user_details['email']
                                  ));


                                } catch(\Stripe\Error\Card $e) {
                                  // Since it's a decline, \Stripe\Error\Card will be caught
                                  $body = $e->getJsonBody();
                                  $err  = $body['error'];

                                  print('Status is:' . $e->getHttpStatus() . "\n");
                                  print('Type is:' . $err['type'] . "\n");
                                  print('Code is:' . $err['code'] . "\n");
                                  // param is '' in this case
                                  print('Param is:' . $err['param'] . "\n");
                                  print('Message is:' . $err['message'] . "\n");

                                } catch (\Stripe\Error\RateLimit $e) {
                                  // Too many requests made to the API too quickly
                                  $body = $e->getJsonBody();
                                  $err  = $body['error'];

                                } catch (\Stripe\Error\InvalidRequest $e) {
                                  // Invalid parameters were supplied to Stripe's API
                                  $body = $e->getJsonBody();
                                  $err  = $body['error'];

                                } catch (\Stripe\Error\Authentication $e) {
                                  // Authentication with Stripe's API failed
                                  // (maybe you changed API keys recently)
                                  $body = $e->getJsonBody();
                                  $err  = $body['error'];

                                } catch (\Stripe\Error\ApiConnection $e) {
                                  // Network communication with Stripe failed
                                  $body = $e->getJsonBody();
                                  $err  = $body['error'];

                                } catch (\Stripe\Error\Base $e) {
                                  // Display a very generic error to the user, and maybe send
                                  // yourself an email
                                  $body = $e->getJsonBody();
                                  $err  = $body['error'];

                                } catch (Exception $e) {
                                  // Something else happened, completely unrelated to Stripe
                                  $body = $e->getJsonBody();
                                  $err  = $body['error'];

                                }

                                if (count($order['shipping_methods']) < 1) {
                                    // creating shipment data using easy post to get delivery rates

                                    \EasyPost\EasyPost::setApiKey("GApzToQ5BwOn9YlJ05H8iQ");

                                    // create address
                                    $address_params1 = array(
                                        "street1" => $user_active_address[0]['address1'],
                                        "street2" => $user_active_address[0]['address2']==='false'?'N/A':$user_active_address[0]['address1'],
                                        "city"    => $user_active_address[0]['city_town'],
                                        "state"   => "GB",
                                        "zip"     => $user_active_address[0]['post_code'],
                                        "country" => "UK",
                                        "phone"   => $user_active_address[0]['phone_num'],
                                        "email"   => $user_details['email']
                                    );

                                    $to_address = \EasyPost\Address::create($address_params1);

                                    // create address
                                    $address_params2 = array(
                                        "street1" => "39 sandmere road",
                                        "city"    => "london",
                                        "state"   => "GB",
                                        "zip"     => "sw47ps",
                                        "country" => "UK",
                                        "company" => "IDYL",
                                        "phone"   => "07983310264"
                                    );

                                    $from_address = \EasyPost\Address::create($address_params2);

                                    $shippment_parcels = array();

                                    for ($parcel=0; $parcel < count($sku_items); $parcel++) {

                                        $parcel_array = array(
                                            'weight'=>$sku_items[$parcel]['package_dimensions']['weight'],
                                            'width'=>$sku_items[$parcel]['package_dimensions']['width'],
                                            'length'=>$sku_items[$parcel]['package_dimensions']['length'],
                                            'height'=>$sku_items[$parcel]['package_dimensions']['height']
                                        );

                                        array_push($shippment_parcels, array('parcel'=> $parcel_array));
                                    }

                                    $shipping_order = \EasyPost\Order::create(array(
                                        "to_address" => $to_address,
                                        "from_address" => $from_address,
                                        "options"=>array(
                                            'currency'=>'gbp'
                                        ),
                                        "shipments" => $shippment_parcels
                                    ));

                                    if (count($shipping_order['rates']) < 1){
                                        echo "<div class=\"\">
                                            <h3 class=\"text-center\">UNFORTUNATELY SHIPPING RATES CANT BE DISPLAYED FOR THIS ORDER. MAKE THE PURCAHSE AND WE WILL HANDLE THE SHIPPING MANUALLY AND SEND YOU AN EMAIL WITH ALL REQUIRED DETAILS</h3>
                                        </div>";
                                    }
                                    else {
                                        // shipping methods from easy post
                                        echo "<form id=\"shipping-method-radios\">";

                                        $template = $twig->load('shipping-options.html.twig');
                                        echo $template->render(array(
                                            'order'=>$order,
                                            'shipping_methods'=>$shipping_order['rates']
                                        ));

                                        echo "</form>"
                                    }

                                }else {
                                    // shipping methods from order created
                                    echo "<form id=\"shipping-method-radios\">";

                                    $template = $twig->load('shipping-options.html.twig');
                                    echo $template->render(array(
                                        'order'=>$order,
                                        'shipping_methods'=>$order['shipping_methods'],
                                        'default_shipping'=>$order['selected_shipping_method']
                                    ));

                                    echo "</form>"
                                }



                             ?>

                    <?php endif; ?>




                </div>


            </div>
        </div>

    </div>
</div>

<div class="pre-info" style="border: 1px solid red; background-color: #d2d2d2; height: 400px; overflow-y:scroll; postion: absolute; top: 0; left:0">

    <pre>
        <?=$order;?>
    </pre>

</div>

<?php
   include ROOT_PATH.'templates/footer.php';
?>
