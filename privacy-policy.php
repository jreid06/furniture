<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
    include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<div class="container help-container">
    <div class="row">
        <div class="col-12">
            <br>
            <h2 class="text-center">PRIVACY POLICY</h2>
            <br>
        </div>

        <div class="col-12 info-columns" id="privacypol-content">
            <!-- DYNAMIC CONTENT HERE -->
        </div>

    </div>
</div>

<?php
    include ROOT_PATH.'templates/footer.php';
 ?>
