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

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">Is it safe to order online? </h4>
            <p>Yes, we use industry standard SSL encryption to protect your details. Potentially sensitive information such as your name, address and card details are encoded so they can only be read on the secure server</p>
            <p>Also all payment information is <strong> securely stored and processed via a third party payment processor </strong>so it makes no contact with our servers or databases.</p>

        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">What currencies can I use? </h4>
            <p>We currently only accept payments in '£GBP'. When payments are processed prices may be subject to conversion depending on your location</p>
            <p>If you are purchasing from outside of the UK please note some banks may charge you an International Transaction Fee.</p>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">What payment methods do you accept?</h4>
            <p><strong>You can use any of the cards listed below</strong></p>
            <ul>
                <li>MasterCard</li>
                <li>Visa Debit</li>
                <li>American Express</li>
            </ul>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">When will I be charged for my order? </h4>
            <p>As soon as your order has been placed the full cost of your order will be debited to the card of choice</p>
        </div>


    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
