<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<div class="container help-container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">ORDERS</h2>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">Order Status</h4>
            <p>Orders can have multiple statuses dependingon which stage you are at </p>
            <ul>
                <li><strong>Created: </strong> When you click payment button</li>
                <li><strong>Paid: </strong> When payment made has been successfull</li>
                <li><strong>Fulfilled: </strong> When the order has successfully been paid and customer has recieved their goods</li>
                <li><strong>Cancelled: </strong> If customer cancels order before it has been fulfilled</li>
                <li><strong>Returned: </strong> If order has been fulfilled, but customer decides to return item for refund or exhange</li>
            </ul>


        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">Can I cancel and order? </h4>
            <p>If your order has been placed, but not dispatched (fulfilled), we will try to make the cancellation wherever possible. Please contact our Customer Services team via telephone as soon as possible after placing the order.</p>
            <p>If you have already received your goods then we are happy to refund you. check our <a href="/help/returns">returns</a>  policy for full information</p>
        </div>


        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">How do I know if my order was successful? </h4>
            <p>We will email to confirm your order has been received, and is being processed.</p>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">Can I view all my orders?</h4>
            <p>If you have successfully created an account with us you'll be able to view every order that has been made while logged in. To view all orders sign in and visit the orders page via the menu</p>
            <p>Already logged in? <a href="/myaccount/orders">View my orders</a> </p>
            <p>Unfortunately if you are not logged in and want to check order history you'll have to contact our customer services team where they will be able to help you with any further enquiries</p>


        </div>


    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
