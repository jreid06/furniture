<?php
    include '../scripts/dbconnect.php';
    include "../backend/templates/header.php";

    // NOTE: check whether page id exists before showing page

    if (!isset($_GET['pageid'])) {
        header('location: /backend/auth/admin/home');
    }

    if (!DatabaseFunctions::checkDataExists('pages','page_id', $_GET['pageid'])) {
        header('location: /backend/auth/admin/home');
        // echo "ERROR PAGE DOESNT EXIST: ".$_GET['pageid'];
    }
 ?>
<body>

    <div id="wrapper">
        <?php include "../backend/templates/nav.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Return content Edit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="text-dark">Return content 1</h3>
                    <div class="markdown-edit-container">
                        <textarea class="mde-textarea" data-v-title="returnContentq1" name="name" rows="8" cols="80" id="return1"></textarea>
                    </div>

                </div>

                <div class="col-12 col-md-6">
                    <h3 class="text-dark">Return content 2</h3>
                    <div class="markdown-edit-container">
                        <textarea class="mde-textarea" data-v-title="returnContentq2" name="name" rows="8" cols="80" id="return2"></textarea>
                    </div>

                </div>

                <div class="col-12 col-md-6">
                    <h3 class="text-dark">Return content 3</h3>
                    <div class="markdown-edit-container">
                        <textarea class="mde-textarea" data-v-title="returnContentq3" name="name" rows="8" cols="80" id="return3"></textarea>
                    </div>

                </div>

                <div class="col-12 col-md-6">
                    <h3 class="text-dark">Return content 4</h3>
                    <div class="markdown-edit-container">
                        <textarea class="mde-textarea" data-v-title="returnContentq4" name="name" rows="8" cols="80" id="return4"></textarea>
                    </div>

                </div>

                <div class="col-12 col-md-12">
                    <div class="content-controls">
                        <button class="btn btn-primary control-content-multi" name="button" data-action="save">Save</button>

                        <button class="btn btn-info control-content-multi" name="button" data-action="publish">Save & publish</button>

                    </div>

                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include '../backend/templates/footer.php' ?>



</body>

</html>
