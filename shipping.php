<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<div class="container help-container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">SHIPPING</h2>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">United Kingdom Shipping options:</h4>
            <ul>
                <li>£2.95 via DPD 2-3 Day Standard Service
Order within 22 hours and 53 minutes to receive your order between Fri 9th Feb and Mon 12th Feb </li>
                <li>£4.95 via DPD Next Working Day Priority Service
Order within 22 hours and 53 minutes to receive your order by Thu 8th Feb </li>
                <li>FREE DPD 2-3 Day Standard Service on orders over £150.00
Order within 22 hours and 53 minutes to receive your order between Fri 9th Feb and Mon 12th Feb</li>
            </ul>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">ADDITIONAL SHIPPING INFO</h4>
            <ul>
                <li>All United Kingdom orders must be signed for upon delivery.</li>
            </ul>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">BULKY GOODS AND FURNITURE</h4>
            <p>When ordering furniture or larger goods, they will be shipped with a special carrier straight to your home within the EU. You will be contacted directly regarding the time of delivery so you can make sure to be home at the address upon delivery. If you happen to not be home at the agreed time of delivery, your item might be returned to the warehouse. In that case, you need to contact us to arrange a re-delivery. The package will be delivered to the curb, and if this is not possible then as close to your house as possible (this service does not include removal of any packaging materials nor pallets). You are responsible for getting the delivery from the curb into your house.</p>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="text-dark">Can I track my parcel?</h4>
            <p>Yes. You will be sent a dispatch confirmation email as soon as your order has been processed. This email will also contain your tracking number.</p>

            <p>For UK orders shipped by DPD visit:</p>
            <ul>
                <li><a href="#">DPD Tracking</a></li>
            </ul>
        </div>

        <div class="col-12 col-md-6 info-columns">
            <h4 class="tex-dark">What if I'm not home when it's delivered? </h4>
            <p>DPD will email and text a 1 hour delivery window on the day of delivery. Should you be unavailable to sign for the parcel you can select from a number of options including, collection from Depot, leave in a safe place, deliver with a neighbour. Please note, DPD may attempt delivery with a neighbour if you have not responded to your text or email.  If they attempt delivery and you are not available they will leave a card detailing how to proceed with regard to re-delivery or collection. They will usually re-attempt delivery up to 3 times before returning your parcel to us.</p>
        </div>
    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
