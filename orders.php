<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<div class="container help-container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">ORDERS</h1>
            <br>
            <br>
        </div>

        <div class="col-12 col-md-6 info-columns" id="order-content1">
            <!-- DYNAMIC CONTENT HERE -->
        </div>

        <div class="col-12 col-md-6 info-columns" id="order-content2">
            <!-- DYNAMIC CONTENT HERE -->
        </div>

        <div class="col-12 col-md-6 info-columns" id="order-content3">
            <!-- DYNAMIC CONTENT HERE -->
        </div>

        <div class="col-12 col-md-6 info-columns" id="order-content4">
            <!-- DYNAMIC CONTENT HERE -->
        </div>

    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
