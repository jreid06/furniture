<?php
include '../scripts/dbconnect.php';
include "../backend/templates/header.php";

?>

<body>

    <div id="wrapper" class="dash-vue">

    <?php include "../backend/templates/nav.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Product images</h1>
                </div>
                <div class="col-xs-12">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h3 class="panel-title">Info</h3>
                      </div>
                      <div class="panel-body">
                        Images are to be uploaded on a per product basis.
                      </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="upload-image-container">
                        <div class="form-group">
                            <div class="header">
                                <h4>Upload up to 3 images for a SKU</h4>
                            </div>
                            <input type="file" id="fileUpload" name="img[]" class="file"  multiple>
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                <span class="input-group-btn">
                                    <button class="browse btn btn-primary input-lg" type="button" @click="showUploadBox"><i class="glyphicon glyphicon-search"></i> Browse</button>
                              </span>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="pending-uploads">
                                <div class="image img1">

                                </div>
                                <div class="image img2">

                                </div>
                                <div class="image img3">

                                </div>
                                <div class="image img4">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
                                <span class="sr-only">2% Complete</span>
                              </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="header">
                                <h4>SKU ID &nbsp;&nbsp;<small>(<em> Get the SKU ID from the stripe dashboard under products tab</em>)</small></h4>
                            </div>
                            <div class="input-group input-group-lg">
                              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-cubes"></i> </span>
                              <input type="text" class="form-control" placeholder="SKU ID here ..." aria-describedby="sizing-addon1">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="header">
                                <h4>Category</h4>
                            </div>
                            <div class="input-group input-group-lg">
                              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-info"></i> </span>
                              <input type="text" class="form-control" placeholder="SKU ID Category ..." aria-describedby="sizing-addon1">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-primary" name="button">ADD SKU IMAGES</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php include '../backend/templates/footer.php' ?>

<body>

</html>
