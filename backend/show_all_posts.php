<?php
    include "../backend/templates/header.php";
    include '../scripts/dbconnect.php';

    // get all blog images from blog images table
    $blog_posts = DatabaseFunctions::getData('*', 'blog', false, false, true);

    if ($blog_posts[0]) {
        $blog_posts = $blog_posts[1];

        $drafts = array();
        $published = array();

        // split into published and drafts
        for ($i=0; $i < count($blog_posts); $i++) {
            if ($blog_posts[$i]['status'] === 'draft') {
                array_push($drafts, $blog_posts[$i]);
            }elseif ($blog_posts[$i]['status'] === 'published') {
                array_push($published, $blog_posts[$i]);
            }
        }

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
                    <h1 class="page-header">All blog posts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <br>
                <!-- delete alert success will go here -->
                <?php if (isset($_SESSION['blog_post_edited'])): ?>
                    <!-- SUCCESS MESSAGE -->
                    <div class="alert alert-success alert-dismissible alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong></strong> <span id="alert-sku-success-msg"><?=$_SESSION['blog_post_edited']?></span>

                    </div>
                <?php endif; ?>

                <?php
                    unset($_SESSION['blog_post_edited']);
                 ?>
            </div>

            <?php
                $template = $twig->load('showallposts.html.twig');
                echo $template->render(array(
                    'blogposts'=>array(
                        'all'=>$blog_posts,
                        'drafts'=>$drafts,
                        'published'=>$published
                    ),
                    'error'=>$error

                ));
             ?>

            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Image <span></span> </h4>
              </div>
              <div class="modal-body">
                  <!-- ERROR MESSAGE -->
                  <div class="alert alert-danger alert-dismissible alert-delete-error" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>INVALID: </strong> <span id="alert-delete-error-msg"></span>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" @click="triggerDelete" data-action="no">No</button>
                <button type="button" class="btn btn-primary" data-action="yes" @click="triggerDelete">Yes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- /#wrapper -->

    <?php include '../backend/templates/footer.php' ?>



</body>

</html>
