<?php
    include 'scripts/dbconnect.php';
    include "backend/templates/header.php";

    if (!isset($_GET['image']) && !isset($_GET['ext'])) {
        header('location: /backend/auth/admin/edit/view-blog-images');
    }else {
        $image_name = $_GET['image'];

        $extention = $_GET['ext'];
        $full_address = '/assets/blogimages/'.$image_name.'.'.$extention;

    }
 ?>

 <div class="container-fluid">
     <div class="image-container text-center">
         <br>
         <br>
         <!-- <h5><?=$image_exists;?></h5>
         <h5>exists: <?=$exists?></h5> -->
         <h3><span class="fa fa-close" id="close-image-page" style="color: #f2f2f2"></span> </h3>
         <br>
         <img src="<?=$full_address?>" alt="">
         <br>
         <br>
         <br>
     </div>
 </div>

 <script type="text/javascript">
     let closeBTN = document.getElementById('close-image-page');

     closeBTN.addEventListener('click', function(){
         console.log('close image page');
         window.close();
     })

 </script>


</body>
</html>
