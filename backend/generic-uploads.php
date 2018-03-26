<?php
    include "../backend/templates/header.php";
    include '../scripts/dbconnect.php';

    // NOTE: check whether page id exists before showing page


 ?>
<body>

    <div id="wrapper" class="dash-vue">
        <?php include "../backend/templates/nav.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Generic Upload section (image files only) </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- upload section -->
                    <input type="file" id="blogUpload" name="img[]" multiple>
                    <div class="input-group col-xs-12" style="margin-bottom: 15px;">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                        <input type="text" class="form-control input-lg" disabled placeholder="Upload Images">
                        <span class="input-group-btn">
                            <button class="browse btn btn-primary input-lg" type="button" @click="blogUploadBox"><i class="glyphicon glyphicon-search"></i> Browse</button>
                      </span>
                    </div>

                    <!-- wrong file type error -->
                    <div class="alert alert-danger alert-dismissible alert-file-error" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>ERROR!</strong> <span id="alert-file-error-msg"></span>
                    </div>

                    <!-- alert limit warning -->
                    <div class="alert alert-warning alert-dismissible alert-limit" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>WARNING!</strong> <span id="alert-limit-msg"></span>
                    </div>

                </div>
                <div class="col-xs-12 text-center">
                    <br>
                    <div class="pending-uploads">

                    </div>
                    <br>
                    <br>
                    <!-- only show button if upload limit has been reached -->
                    <button v-if="blogimagesUpload.counter.counterTemp === blogimagesUpload.limit" type="button" class="btn btn-primary reset-btn" @click="resetUploadValues">Reset Upload</button>
                    <br>
                    <br>
                </div>
            </div>

            <?php
                // $template = $twig->load('blogimages.html.twig');
                // echo $template->render(array(
                //     'data'=>'template connected'
                // ));
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
