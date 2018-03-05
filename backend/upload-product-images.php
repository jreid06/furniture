<?php
include '../scripts/dbconnect.php';
include "../backend/templates/header.php";

?>

<body>

    <div id="wrapper" class="dash-vue">

    <?php
        // used to display success message after an SKU's images has been added successfully
        if (isset($_COOKIE['idyl-image-add'])){
            $_SESSION['idyl-image-add'] = $_COOKIE['idyl-image-add'];
            setcookie('idyl-image-add', "", time() - 86400, "/");
        }
     ?>

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
                <div class="col-xs-12">
                    <?php if (isset($_SESSION['idyl-image-add'])): ?>
                        <div class="alert alert-success alert-dismissible alert-cat" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>SUCCESS: </strong>
                          <span id="alert-success-msg">
                            <?php
                                echo $_SESSION['idyl-image-add'];

                                // remove session
                                unset($_SESSION['idyl-image-add']);
                            ?>
                          </span>
                        </div>
                    <?php endif; ?>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="upload-image-container">

                        <hr>

                        <div class="form-group upload-form-group">
                            <div class="field-cover">

                            </div>
                            <div class="header">
                                <h4>SKU ID &nbsp;&nbsp;<small>(<em> Get the SKU ID from the stripe dashboard under products tab * </em>)</small></h4>
                            </div>
                            <div class="input-group input-group-lg">
                              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-cubes"></i> </span>
                              <input v-model="upload.files.sku_parent" type="text" class="form-control image-sku-input" placeholder="SKU ID here ..." aria-describedby="sizing-addon1">
                            </div>
                            <div class="alert alert-warning alert-dismissible alert-sku" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>INVALID: </strong> <span id="alert-sku-msg"></span>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-primary disabled" id="submitImages" name="button" @click="addSkuImages">ADD SKU IMAGES</button>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="header">
                                <h4>Upload up to 4 images for a SKU</h4>
                                <br>
                                <div class="alert alert-info alert-dismissible alert-total" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <strong>ALERT!</strong> <span id="alert-msg"></span>
                                </div>
                            </div>
                            <input type="file" id="fileUpload" name="img[]" class="file"  multiple>
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="text" class="form-control input-lg" disabled placeholder="Upload Images">
                                <span class="input-group-btn">
                                    <button class="browse btn btn-primary input-lg" type="button" @click="showUploadBox"><i class="glyphicon glyphicon-search"></i> Browse</button>
                              </span>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="pending-uploads">

                            </div>
                        </div>

                        <hr>


                        <!-- <div class="form-group upload-form-group">
                            <div class="field-cover">

                            </div>
                            <div class="header">
                                <h4>Category &nbsp;&nbsp;<small>(<em> * </em>)</small></h4>

                            </div>
                            <div class="input-group input-group-lg">
                              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-info"></i> </span>
                              <input v-model="upload.files.category" type="text" class="form-control image-category-input" placeholder="SKU Category (livingroom, kitchen, bedroom, bath)..." aria-describedby="sizing-addon1">
                            </div>
                            <div class="alert alert-danger alert-dismissible alert-cat" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>INVALID: </strong> <span id="alert-cat-msg"></span>
                            </div>
                        </div>

                        <hr> -->

                        <hr>

                        <div class="form-group">
                            <div class="pending-uploads2">
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

                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php include '../backend/templates/footer.php' ?>

<body>

</html>
