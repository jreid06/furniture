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
        <?php include "../backend/templates/nav-vue.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Privacy Policy edit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <h3 class="text-dark"></h3>
                    <div class="markdown-edit-container md-long">
                        <textarea class="mde-textarea" data-v-title="privacypolContent" name="name" rows="8" cols="80" id="privacypol"></textarea>
                    </div>

                </div>


                <div class="col-12 col-md-12">
                    <div class="content-controls">
                        <button class="btn btn-primary control-content" name="button" data-action="save" data-instance="privacypolContent">Save</button>

                        <button class="btn btn-info control-content" name="button" data-action="publish">Save & publish</button>

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
