<?php

    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
    $page = '';
    // check to make sure that the user is logged in
    if(!isset($_SESSION['idyl_tkn']) && !isset($_COOKIE['idyl_tkn']) ) {
        header('location: /login');
        exit();
    }
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
    elseif (isset($_COOKIE['idyl_tkn']) || isset($_SESSION['idyl_tkn']) && $_GET['q'] === 'home') {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
        $page = $_GET['q'];
            // get user information
        $user_email = isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];
        $user_details = DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();

        // get order information to be used when rendering twig order template

        //order info from stripe
        // \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        // $stripe_order = \Stripe\Order::retrieve("or_1Birh9L06dWivKUToX6SRjOF");

        // order info from database
        $order = DatabaseFunctions::getOrderData('*','orders', $user_details['cus_id']);
        $itemCount = array();

        /*
            FOR loop
             - changes saved ORDER JSON string into array
             - count items with type sku to represent actual items in the order e.g (excluding shipping & tax)

        */
        for ($i=0; $i < count($order); $i++) {
            $order[$i]['real_json'] = json_decode($order[$i]['order_json'], true);

            for ($j=0; $j < count($order[$i]['real_json']['items']); $j++) {
                if ($order[$i]['real_json']['items'][$j]['type'] === 'sku') {
                    $itemCount[] = $order[$i]['real_json']['items'][$j];
                }
            }
        }

    }

    elseif (isset($_COOKIE['idyl_tkn']) || isset($_SESSION['idyl_tkn']) && $_GET['q'] === 'details') {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
        $page = $_GET['q'];

        $user_email =  isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];
        $user_details = DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();
    }

    elseif (isset($_COOKIE['idyl_tkn']) || isset($_SESSION['idyl_tkn']) && $_GET['q'] === 'wishlist') {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
        $page = $_GET['q'];
    }

    elseif (isset($_COOKIE['idyl_tkn']) || isset($_SESSION['idyl_tkn']) && $_GET['q'] === 'orders') {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
        $page = $_GET['q'];

        $user_email =  isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];
        $user_details = DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();
        $order = DatabaseFunctions::getOrderData('*','orders', $user_details['cus_id']);
        $itemCount = array();

        /*
            FOR loop
             - changes saved ORDER JSON string into array
             - count items with type sku to represent actual items in the order e.g (excluding shipping & tax)

        */
        for ($i=0; $i < count($order); $i++) {
            $order[$i]['real_json'] = json_decode($order[$i]['order_json'], true);

            for ($j=0; $j < count($order[$i]['real_json']['items']); $j++) {
                if ($order[$i]['real_json']['items'][$j]['type'] === 'sku') {
                    $itemCount[] = $order[$i]['real_json']['items'][$j];
                }
            }
        }

    }
    elseif (isset($_COOKIE['idyl_tkn']) || isset($_SESSION['idyl_tkn']) && $_GET['q'] === 'addressbook') {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
        $page = $_GET['q'];

        $user_email =  isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];
        $user_details =  DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();
        $user_details['address'] = json_decode($user_details['address']);

    }
    elseif (isset($_COOKIE['idyl_tkn']) || isset($_SESSION['idyl_tkn']) && $_GET['q'] === 'addaddress') {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
        $page = $_GET['q'];
    }
    elseif (isset($_COOKIE['idyl_tkn']) || isset($_SESSION['idyl_tkn']) && $_GET['q'] === 'editaddress') {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
        $page = $_GET['q'];

        $user_email =  isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];
        $user_details =  DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();
        $user_details['address'] = json_decode($user_details['address'], true);

        $select_address = ((int) $_COOKIE['idyl-address-pos']);
        $address_info = $user_details['address'];
    }
    else {
        header('location: /login');
    }
?>

<?php if ($page === 'home'): ?>
    <div class="container-fluid user-account-home user-vue">
         <div class="row">
             <div class="col-12 col-md-6 ua-home-col">
                 <dl class="row dl-box">
                     <h4 class="col-12"><strong>Your Details</strong> </h4>
                     <hr>
                     <div class="dl-box-content">
                         <dt class="col-5">Name</dt>
                         <dd class="col-7"><?= $user_details['title']." ".$user_details['fname']." ".$user_details['lname'] ?></dd>
                             <hr>
                         <dt class="col-5">Email</dt>
                         <dd class="col-7"><?= $user_details['email']; ?></dd>
                             <hr>
                         <dt class="col-5">Date of birth</dt>
                         <dd class="col-7"><?= $user_details['dob']?></dd>
                             <hr>
                         <dd class="col-12">
                             <a href="/myaccount/details" class="btn btn-primary">Edit details</a>
                         </dd>
                     </div>
                 </dl>
             </div>
             <div class="col-12 col-md-6">
                 <dl class="row dl-box">
                     <h4 class="col-12"><strong>Recent orders</strong> </h4>
                     <hr>
                     <!-- render list of orders if there are any -->
                     <div class="dl-box-content">
                         <?php
                         $template = $twig->load('orders.html.twig');
                         echo $template->render(array(
                             'orderSQL'=> $order,
                             'itemCount'=>$itemCount
                         ));

                          ?>

                     </div>

                 </dl>
             </div>
             <div class="col-12 col-md-6">
                 <dl class="row dl-box">
                     <h4 class="col-12"><strong>Wishlist</strong> </h4>
                     <hr>
                     <dd class="col-12">Currently there is <span id="item-counter">{{wishlist.totalItems}}</span> item(s) in your wishlist </dd>
                     <div class="dl-box-content">

                         <div class="table-responsive">
                             <table class="table">
                                 <thead class="thead-dark">
                                     <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Price</th>
                                       <th scope="col">Description</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <!-- v-for on template to list all items in basket-->
                                     <template v-for="(wishlistItem, index) in wishlist.items">
                                         <tr>
                                             <th scope="row">{{index+1}}</th>
                                             <td>{{wishlistItem.prod_name}}</td>
                                             <td>£{{wishlistItem.price}}</td>
                                             <td style="width: 600px;">{{wishlistItem.prod_desc}}</td>
                                         </tr>
                                     </template>


                                 </tbody>
                             </table>
                         </div>

                     </div>
                 </dl>
             </div>
             <div class="col-12 col-md-6">
                 <dl class="row dl-box">
                     <h4 class="col-12"><strong>Basket</strong> </h4>
                     <hr>
                     <dd class="col-12">Currently there is <span id="item-counter">{{basketCount}}</span> item(s) in your basket </dd>
                     <div class="dl-box-content">
                         <div class="table-responsive">
                             <table class="table">
                                 <thead class="thead-dark">
                                     <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Price</th>
                                       <th scope="col">Quantity</th>
                                       <th scope="col">Total</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <!-- v-for on template to list all items in basket-->
                                     <template v-for="(basketItem, index) in basket.items">
                                         <tr>
                                             <th scope="row">{{index+1}}</th>
                                             <td>{{basketItem.prod_name}}</td>
                                             <td>{{basketItem.price}}</td>
                                             <td>{{basketItem.quantity}}</td>
                                             <td>£{{basketItem.total_price}}</td>
                                         </tr>
                                     </template>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </dl>
             </div>
             <!-- <div class="col-12 col-md-6">
                 <dl class="row dl-box">
                     <pre>

                     </pre>
                 </dl>
             </div> -->
         </div>
    </div>

<?php elseif($page === "details"): ?>
    <div class="container-fluid user-account-details user-vue">
        <?php
        $template = $twig->load('details.html.twig');
        echo $template->render(array(
            'current_email'=>$user_email,
            'current_details'=>$user_details
        ));
         ?>
    </div>

<?php elseif($page === "wishlist"): ?>
    <div class="container-fluid user-account-home user-vue">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Image</th>
                              <th scope="col">Name</th>
                              <th scope="col">Price</th>
                              <th scope="col" colspan="2">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- v-for on template to list all items in basket-->
                            <template v-for="(wishlistItem, index) in wishlist.items">
                                <tr>
                                    <th scope="row" style="vertical-align: middle;">{{index+1}}</th>
                                    <td><img :src="wishlistItem.prod_image" :alt="wishlistItem.prod_name" width="150"> </td>
                                    <td>{{wishlistItem.prod_name}}</td>
                                    <td>£{{wishlistItem.price}}</td>
                                    <td style="width: 600px;">{{wishlistItem.prod_desc}}</td>
                                    <td class="">
                                        <div class="poc-upsl d-flex flex-wrap flex-row">

                                            <!-- checkitemexists func if false shows add cart btn -->
                                            <template v-if="!inBasket">
                                                <div class="p-2">
                                                    <div class="" :data-product-info="JSON.stringify(wishlistItem)"><a :href="'/product/'+wishlistItem.category+'/'+wishlistItem.prod_type+'/'+wishlistItem.name_slug+'-'+wishlistItem.prod_tags.color+'-'+wishlistItem.prod_tags.size+'/'+wishlistItem.product_id+'/'+wishlistItem.stripesku_id">SHOP NOW</a> </div>
                                                </div>
                                            </template>

                                            <div class="p-2">
                                                <div class="btn btn-danger" :data-product-info="JSON.stringify(wishlistItem)" @click="removeFromWishlist"><span class="fa fa-trash-o" :data-product-info="JSON.stringify(wishlistItem)" style="width: 80px;"></span></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </template>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
<?php elseif($page === "orders"): ?>
    <div class="container-fluid user-account-home user-vue">
        <?php
            $template = $twig->load('orders.html.twig');
            echo $template->render(array(
                'orderSQL'=> $order,
                'itemCount'=>$itemCount
            ));
         ?>
    </div>
<?php elseif($page === "addressbook"): ?>
    <div class="container-fluid user-account-home user-vue address-book-vue">
        <?php if (isset($_SESSION['idyl_address_deleted'])): ?>
            <br><br>
            <div class="col-12">
                <div class="alert alert-success text-center" role="alert">
                      <?= $_SESSION['idyl_address_deleted'] ?>

                      <?php
                        //delete the session
                        unset($_SESSION["idyl_address_deleted"]);
                       ?>
                </div>
            </div>
        <?php elseif(isset($_SESSION['idyl_address_added'])): ?>
            <br><br>
            <div class="col-12">
                <div class="alert alert-success text-center" role="alert">
                      <?= $_SESSION['idyl_address_added'] ?>

                      <?php
                        //delete the session
                        unset($_SESSION["idyl_address_added"]);
                       ?>
                </div>
            </div>

        <?php elseif(isset($_SESSION['idyl_address_edited'])): ?>
            <br><br>
            <div class="col-12">
                <div class="alert alert-success text-center" role="alert">
                      <?= $_SESSION['idyl_address_edited'] ?>

                      <?php
                        //delete the session
                        unset($_SESSION["idyl_address_edited"]);
                       ?>
                </div>
            </div>
        <?php endif; ?>

        <?php
            $template = $twig->load('address.html.twig');
            echo $template->render(array(
                'user_details'=>$user_details
            ));
         ?>
    </div>
<?php elseif($page === "addaddress"): ?>

    <div class="container-fluid user-account-home user-vue address-book-vue">
        <div class="row">
            <div class="col-12">
                <form id="addAddress" class="address-form">
                    <h4>Add Address</h4>
                    <br>
                    <div class="form-group">
                        <label for="inputTitleSelect">Title *</label>
                        <select class="inputTitleSelect" name="user-title" required>
                            <option value="default">Please select option</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Miss.">Miss.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputFnameAddress">First name *</label>
                        <input type="text" class="form-control" id="inputFnameAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="inputLnameAddress">Last name *</label>
                        <input type="text" class="form-control" id="inputLnameAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPhoneAddress">Phone no. * (e.g 07983 100 100)</label>
                        <input id="phone-input-address" type="text" class="form-control" id="inputPhoneAddress" required>
                        <p><small id="phone-input-message"></small></p>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="inputAddress1">Address line 1 *</label>
                        <input type="text" class="form-control" id="inputAddress1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <p><small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small></p>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address line 2</label>
                        <input type="text" class="form-control" id="inputAddress2" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress3">Address line 3</label>
                        <input type="text" class="form-control" id="inputAddress3" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="inputCityTown">City / town *</label>
                        <input type="text" class="form-control" id="inputCityTown" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPostCode">Post code *</label>
                        <input id="postcode-input" type="text" class="form-control" id="inputPostCode" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <p><small id="postcode-input-mesage" class="form-text text-muted"></small></p>
                    </div>
                    <div class="form-group">
                        <label for="inputCountrySelect">Country *</label>
                        <select class="inputCountrySelect" name="user-title" required>
                            <option value="United Kingdom" selected>United Kingdom</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatusSelect">Active Status *</label>
                        <select class="inputStatusSelect" name="user-title" required>
                            <option value="false" selected>Not active</option>
                            <option value="true">Active</option>
                        </select>
                        <p><small class="form-text text-muted">Changing this to active will make this the active address</small> </p>
                    </div>


                    <input type="submit" class="btn btn-primary btn-block btn-large create-user" value="Add address" @click.prevent="addAddress">
                </form>
            </div>
        </div>


    </div>

<?php elseif($page === "editaddress"): ?>
    <div class="container-fluid user-account-home user-vue address-book-vue">
        <div class="row">
            <div class="col-12">
                <form id="editAddress" class="address-form">
                    <h4>Edit Address</h4>
                    <br>
                    <div class="form-group">
                        <label for="inputTitleSelect">Title *</label>
                        <select class="inputTitleSelect" name="user-title" required>
                            <option value="default">Please select option</option>
                            <option value="Mr." <?php if ($address_info[$select_address]['title'] === 'Mr.'): ?>selected<?php endif; ?>>Mr.</option>
                            <option value="Miss."<?php if ($address_info[$select_address]['title'] === 'Miss.'): ?>selected<?php endif; ?>>Miss.</option>
                            <option value="Mrs." <?php if ($address_info[$select_address]['title'] === 'Mrs.'): ?>selected<?php endif; ?>>Mrs.</option>
                            <option value="Ms." <?php if ($address_info[$select_address]['title'] === 'Ms.'): ?>selected<?php endif; ?>>Ms.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputFnameAddress">First name *</label>
                        <input type="text" class="form-control" id="inputFnameAddress" value="<?=$address_info[$select_address]['first_name']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputLnameAddress">Last name *</label>
                        <input type="text" class="form-control" id="inputLnameAddress" value="<?=$address_info[$select_address]['last_name']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPhoneAddress">Phone no. * </label>
                        <input id="phone-input-address" type="text" class="form-control" id="inputPhoneAddress" placeholder="(e.g 07983 100 100)" value="<?=$address_info[$select_address]['phone_num']?>" required>
                        <p><small id="phone-input-message"></small></p>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="inputAddress1">Address line 1 *</label>
                        <input type="text" class="form-control" id="inputAddress1" aria-describedby="emailHelp" placeholder="" value="<?=$address_info[$select_address]['address1']?>" required>
                        <p><small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small></p>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address line 2</label>
                        <input type="text" class="form-control" id="inputAddress2" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress3">Address line 3</label>
                        <input type="text" class="form-control" id="inputAddress3" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputCityTown">City / town *</label>
                        <input type="text" class="form-control" id="inputCityTown" aria-describedby="emailHelp" placeholder="Enter city" value="<?=$address_info[$select_address]['city_town']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPostCode">Post code *</label>
                        <input id="postcode-input" type="text" class="form-control" id="inputPostCode" aria-describedby="emailHelp" placeholder="Enter post code" value="<?=$address_info[$select_address]['post_code']?>" required>
                        <p><small id="postcode-input-mesage" class="form-text text-muted"></small></p>
                    </div>
                    <div class="form-group">
                        <label for="inputCountrySelect">Country *</label>
                        <select class="inputCountrySelect" name="user-title" required>
                            <option value="United Kingdom" selected>United Kingdom</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatusSelect">Active Status *</label>
                        <select class="inputStatusSelect" name="user-title" required>
                            <option value="false" <?php if ($address_info[$select_address]['status'] === 'false'): ?>selected<?php endif; ?>>Not active</option>
                            <option value="true" <?php if ($address_info[$select_address]['status'] === 'true'): ?>selected<?php endif; ?>>Active</option>
                        </select>
                        <p><small class="form-text text-muted">Changing this to active will make this the active address</small> </p>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block btn-large create-user" value="save changes" data-index="<?= $select_address ?>" @click.prevent="editAddress">
                </form>
            </div>
        </div>
    </div>

<?php endif; ?>


<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
