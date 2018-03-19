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
                        // get all brand categories
                        $brand_data = DatabaseFunctions::getData('*', 'brands', false, false, true);

                        // var_dump($brand_data[1]);
                        $brand_parsed_data = array();

                        foreach ($brand_data[1][0] as $key => $value) {
                            if(explode('_',$key)[0] === 'ALPH'){

                                if (json_decode( $value, true )) {
                                    array_push($brand_parsed_data, json_decode( $value, true ));
                                }

                            }
                        }

                        // check if alert sessions are set
                        $alert_success = isset($_SESSION['brand_edit_success'])?$_SESSION['brand_edit_success']:false;
                        $alert_error = isset($_SESSION['brand_edit_error'])?$_SESSION['brand_edit_error']:false;

                        $template = $twig->load('editbrands.html.twig');
                        echo $template->render(array(
                            'brands'=>$brand_parsed_data,
                            'session'=>array(
                                'success'=>$alert_success,
                                'error'=>$alert_error
                            )
                        ));

                        if ($alert_success) {
                            unset($_SESSION['brand_edit_success']);
                        }

                        if ($alert_error) {
                            unset($_SESSION['brand_edit_error']);
                        }
                    }
              ?>

         </div>
         <!-- /#page-wrapper -->

     </div>
     <!-- /#wrapper -->

     <?php include '../backend/templates/footer.php' ?>



 </body>

 </html>
