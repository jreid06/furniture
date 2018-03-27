<?php

    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';


    Connect::checkConnection();
    $blog_posts = DatabaseFunctions::getDataLimit('*', 'blog', 'status', 'published', false, false);

    if ($blog_posts[0]) {
        $blog_posts = $blog_posts[1];
        $error = false;

        // adding formatted date information to each post before rendering
        for ($i=0; $i < count($blog_posts); $i++) {
            $timestamp = $blog_posts[$i]['date_published'];
            $formatted_ts = format_timestamp($timestamp);

            $blog_posts[$i]['date'] = array(
                'time' => $formatted_ts['time'],
                'day' => $formatted_ts['day'],
                'month' => $formatted_ts['month'],
                'year' => $formatted_ts['year'],
                'full' => $formatted_ts['full_date']
            );
        }

    }else {
        $error = true;
    }

 ?>

 <div class="container-fluid home all-blog-posts">
     <div class="row">
         <div class="col-12">
             <br>
             <br>
             <h1 class="text-center">All Blog Posts</h1>
             <br>
         </div>
     </div>
     <div class="row">
         <?php
            $template = $twig->load('blog-post-main.html.twig');
            echo $template->render(array(
                'error'=> $error,
                'months'=> $months,
                'posts'=>$blog_posts
            ));
         ?>
     </div>
 </div>

 <?php
        include ROOT_PATH.'templates/footer.php';
  ?>
