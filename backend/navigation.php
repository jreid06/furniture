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
                     <h1 class="page-header">Navigation</h1>
                 </div>
                 <!-- /.col-lg-12 -->
             </div>
             <!-- /.row -->

             <div class="row">
                 <div class="col-xs-11">
                     <div class="input-group">
                         <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-link"></i> </span>
                        <input type="text" class="form-control add-navlink-input" placeholder="Add Link here" aria-describedby="sizing-addon2">
                     </div>
                 </div>

                 <div class="col-xs-1 text-center">
                     <button type="button" class="btn btn-primary" @click="createNavLink">Add&nbsp;&nbsp;&nbsp;<span class="fa fa-plus"></span></button>
                 </div>

                 <div class="col-xs-12">
                     <br>
                     <!-- warning message for duplicate entry-->
                     <div class="alert alert-warning alert-dismissible alert-nav-add-error-warn" style="display: none;"role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <strong></strong> <span id="warn-nav-add-error-msg"></span>

                     </div>

                     <!-- error message for empty field -->
                     <div class="alert alert-danger alert-dismissible alert-nav-add-error" style="display: none;"role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <strong></strong> <span id="alert-nav-add-error-msg"></span>

                     </div>

                 </div>


                 <div class="col-xs-12">
                     <hr>
                     <!-- success alert for updates or successful brand category addition -->
                     <?php if (isset($_SESSION['navlink_status'])): ?>
                         <div class="alert <?=$_SESSION['navlink_status']['class']?> alert-dismissible alert-nav-add-success" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong></strong> <span id="alert-nav-success-msg"><?=$_SESSION['navlink_status']['msg']?></span>

                         </div>

                     <?php

                        // delete the session created for error/success message
                        unset($_SESSION['navlink_status']);
                     ?>
                     <?php endif; ?>

                 </div>
             </div>

            <!-- nav edit section -->
             <div class="row">
                 <?php

                        // get the navigation data from database
                        $nav_data = DatabaseFunctions::getData('*', 'navigation', false, false, true);

                        if ($nav_data[0]) {
                            $nav_data = $nav_data[1];
                            $error = false;
                        }else {
                            $error = true;
                        }

                        /*
                            process data
                            - parse each nav link's json data
                            - resave it in same key=>value pair
                        */

                        if (!$error) {
                            for ($i=0; $i < count($nav_data); $i++) {
                                $nav_data[$i]['nav_json_data'] = json_decode( $nav_data[$i]['nav_json_data'], true);
                            }
                        }




                        $template = $twig->load('navigation_list.html.twig');
                        echo $template->render(array(
                            'error'=>$error,
                            'navdata'=>$nav_data

                        ));
                  ?>
             </div>

         </div>
         <!-- /#page-wrapper -->

     </div>
     <!-- /#wrapper -->

     <?php include '../backend/templates/footer.php' ?>



 </body>

 </html>
