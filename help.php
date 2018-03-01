<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<div class="container help-container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">HELP</h1>
            <h3><strong>Choose from topics listed below: </strong> </h3>
            <br>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <div class="card">
                <div class="card-header">
                    SHIPPING
                </div>
                <div class="card-body">
                    <p class="card-text">View all our shipping information via link below</p>
                    <a href="/help/shipping" class="btn btn-primary">Shipping</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <div class="card">
                <div class="card-header">
                    RETURNS
                </div>
                <div class="card-body">
                    <p class="card-text">View all our returns information via link below</p>
                    <a href="/help/returns" class="btn btn-primary">Returns</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <div class="card">
                <div class="card-header">
                    PAYMENT
                </div>
                <div class="card-body">
                    <p class="card-text">View all our payment information via link below</p>
                    <a href="/help/payments" class="btn btn-primary">Payment</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <div class="card">
                <div class="card-header">
                    ORDERS
                </div>
                <div class="card-body">
                    <p class="card-text">View all our information related to orders via link below</p>
                    <a href="/help/orders" class="btn btn-primary">Orders</a>
                </div>
            </div>
        </div>


    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
