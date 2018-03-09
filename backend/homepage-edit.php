<?php
    include "../backend/templates/header.php";
    include '../scripts/dbconnect.php';

    // NOTE: check whether page id exists before showing page

    if (!isset($_GET['pageid'])) {
        header('location: /backend/auth/admin/home');
    }

    // get slideshow data from database

    $slides = DatabaseFunctions::getData('*', 'homeslides', 'table_name', 'slides');

    if ($slides[0]) {
        $slides = $slides[1];
        $slides['slides_json'] = json_decode( $slides['slides_json'], true);
        $error = false;
    }else {
        $error = true;
    }
 ?>
<body>

    <div id="wrapper" class="dash-vue">
        <?php include "../backend/templates/nav.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Home Page Content Edit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php
                $template = $twig->load('slidesedit.html.twig');
                echo $template->render(array(
                    'error'=>$error,
                    'slides'=>$slides
                ));
             ?>



            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include '../backend/templates/footer.php' ?>



</body>

</html>
