<?php
    include "../backend/templates/header.php";
    include '../scripts/dbconnect.php';


    if (isset($_GET['type'])) {
        $type = $_GET['type'];
        $values = array('add','edit');
        $counter = 0;

        for ($i=0; $i < count($values); $i++) {
            if ($type === $values[$i]) {
                $counter += 1;
            }
        }

        if ($counter < 1) {
            header('location: /backend/auth/admin/home');
        }



    }else {
        header('location: /backend/auth/admin/home');
    }

 ?>

 <body>

     <div id="wrapper" class="dash-vue">
         <?php include "../backend/templates/nav.php" ?>
         <div id="page-wrapper">

             <?php

                    if ($type === 'add') {
                        $template = $twig->load('addbrands.html.twig');
                        echo $template->render(array(

                        ));

                    }elseif($type === 'edit') {
                        $template = $twig->load('editbrands.html.twig');
                        echo $template->render(array(

                        ));
                    }
              ?>

         </div>
         <!-- /#page-wrapper -->

     </div>
     <!-- /#wrapper -->

     <?php include '../backend/templates/footer.php' ?>



 </body>

 </html>
