<?php

    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    include ROOT_PATH.'templates/header.php';


    // get current blog post
    if (isset($_GET['postid'])) {

        $post_id = $_GET['postid'];
        $post_exists = DatabaseFunctions::getData('*', 'blog', 'post_id', $post_id);

        if ($post_exists[0]) {
            include ROOT_PATH.'templates/nav.php';
        }else {
            # redirect user to main blog page showing all blog posts
            header('location: /blog/all');
        }
    }

    // parse blog body markdown
    $blog_body_markdown = $post_exists[1]['blog_body'];
    $Parsedown = new Parsedown();
    $blog_body_markdown = $Parsedown->text($blog_body_markdown);

    // format post timestamp
    $timestamp = $post_exists[1]['date_published'];
    $formatted_ts = format_timestamp($timestamp);

    $post_exists[1]['date'] = array(
        'time' => $formatted_ts['time'],
        'day' => $formatted_ts['day'],
        'month' => $formatted_ts['month'],
        'year' => $formatted_ts['year'],
        'full' => $formatted_ts['full_date']
    );

    $template = $twig->load('post-body.html.twig');
    echo $template->render(array(
        'post'=>$post_exists[1],
        'months'=> $months,
        'post_body'=> $blog_body_markdown
    ));



    include ROOT_PATH.'templates/footer.php';

 ?>
