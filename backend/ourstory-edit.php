<?php
    include "../backend/templates/header.php";

    // NOTE: check whether page id exists before showing page

    if (!isset($_GET['pageid'])) {
        header('location: /backend/auth/admin/home');
    }
 ?>
<body>

    <div id="wrapper">
        <?php include "../backend/templates/nav-vue.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Our Story Content Edit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="markdown-edit-container">

                        <textarea name="name" rows="8" cols="80" id="story"></textarea>

                    </div>

                </div>

                <div class="col-12">
                    <div class="content-controls">
                        <button class="btn btn-primary control-content" name="button" data-action="save" data-instance="storyContent">Save</button>

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
