<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<div class="container help-container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">PAYMENTS</h2>
        </div>

        <div class="col-12 col-md-6 info-columns" id="payment-content1">
            <!-- DYNAMIC CONTENT HERE -->
        </div>

        <div class="col-12 col-md-6 info-columns" id="payment-content2">
            <!-- DYNAMIC CONTENT HERE -->
        </div>

        <div class="col-12 col-md-6 info-columns" id="payment-content3">
            <!-- DYNAMIC CONTENT HERE -->
        </div>

        <div class="col-12 col-md-6 info-columns" id="payment-content4">
            <!-- DYNAMIC CONTENT HERE -->
        </div>


    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>