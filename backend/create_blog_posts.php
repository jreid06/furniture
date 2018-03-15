<?php
    include "../backend/templates/header.php";
    include '../scripts/dbconnect.php';

    // get all blog images from blog images table
    $blog_images = DatabaseFunctions::getData('*', 'blog_images', false, false, true);
    $blog_categories = DatabaseFunctions::getData('*', 'blog_categories', false, false, true);
    if ($blog_images[0] && $blog_categories[0]) {
        $blog_images = $blog_images[1];
        $blog_categories = $blog_categories[1];

        $error = false;
    }else {
        $error = true;
    }
 ?>
<body>

    <div id="wrapper">
        <?php include "../backend/templates/nav-vue.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create blog posts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <br>
                <!-- delete alert success will go here -->
                <?php if (isset($_SESSION['blog_post_created'])): ?>
                    <!-- SUCCESS MESSAGE -->
                    <div class="alert alert-success alert-dismissible alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong></strong> <span id="alert-sku-success-msg"><?=$_SESSION['blog_post_created']?></span>

                    </div>
                <?php endif; ?>

                <?php
                    unset($_SESSION['blog_post_created']);
                 ?>
            </div>

            <?php
                $template = $twig->load('createpost.html.twig');
                echo $template->render(array(
                    'blog_images'=>$blog_images,
                    'blog_categories'=>$blog_categories,
                    'type'=> 'create',
                    'error'=>$error
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
