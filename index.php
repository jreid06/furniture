<?php
    // echo dirname(__DIR__);
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // include '/scripts/dbconnect.php';
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';

?>
<div class="loader-screen loader-generic">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<div class="container-fluid home">
    <div class="row">
        <div class="col-12 slider-column">

            <template v-if="slidesActive">
                <div class="home-slide">
                    <slideshow
                        v-for="(slide, index) in slides"
                        v-bind:key="slide.id"
                        v-bind:image="slide.image"
                        v-bind:title="slide.title"
                        v-bind:content="slide.content"
                        v-bind:btntext="slide.cta.text"
                        v-bind:btnlink="slide.cta.link">
                    </slideshow>
                </div>
            </template>

        </div>
        <div class="col-12 home-main">

            <!--  -->
            <div class="row" id="shop">
                <category
                    v-for="(category, index) in categories"
                    v-bind:key="category.name"
                    v-bind:categoryname="category.name"
                    v-bind:image="category.image"
                    v-bind:categorylink="category.categoryLink"
                    v-bind:num="index">
                </category>
            </div>

            <div class="row">
                <div class="custom-separate"></div>
                <div class="col-12">
                    <h5 class="text-center section-heading">FEATURED PRODUCTS</h5>
                    <br>
                </div>

                <?php

                $featured_products = get_products(6);

                $template = $twig->load('featured.html.twig');
                echo $template->render(array(
                    'featured_products'=>$featured_products
                ));

                 ?>

            </div>

            <!--  -->
            <div class="row" id="stories-blog">
                <div class="custom-separate"></div>
                <div class="col-12">
                    <h5 class="text-center section-heading">STORIES</h5>
                    <br>
                </div>

                <?php

                    $blog_posts = get_limited_blog_posts('*', 'blog', 'status', 'published', 3);

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

                    $template = $twig->load('blog-post-home.html.twig');
                    echo $template->render(array(
                        'error'=> $error,
                        'months'=> $months,
                        'posts'=>$blog_posts
                    ));
                 //
                 // ?>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <a href="/blog/all" class="btn btn-primary">
                        VIEW ALL POSTS
                    </a>
                    <hr>
                </div>
            </div>
            <!--  -->

            <div class="row" id="stories-blog">
                <div class="custom-separate"></div>
                <div class="col-12 d-flex justify-content-center">
                    <p>INSTAGRAM FEED HERE</p>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- <div class="">
    <form action="/charge" method="post">
      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="//$stripe['publishable_key']"
              data-description="Access for a year"
              data-amount="20000"
              data-locale="auto"
              data-currency="GBP"></script>
    </form>
</div> -->

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
