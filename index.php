<?php
    // echo dirname(__DIR__);
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // include '/scripts/dbconnect.php';

    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';

    // Connect::checkConnection();
    // var_dump($_SESSION);
    //
    // echo "<br>";
    // echo "<br>";
    // echo "<br>";
    // echo "<br>";
    //
    // echo $session_not_set."<br>";
    // echo $cookie_not_set."<br>";

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
                        v-bind:image="slide.image">
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
                    v-bind:num="index">
                </category>
            </div>

            <!-- <div class="row">
                <div class="col-12 button-box d-flex justify-content-center align-items-center">
                    <a href="/products" class="btn btn-primary">
                        SHOP NOW
                    </a>
                    <hr>
                </div>
            </div> -->
            <!--  -->

            <div class="row">
                <div class="custom-separate"></div>
                <div class="col-12">
                    <h5 class="text-center">FEATURED PRODUCTS</h5>
                    <br>
                </div>

                <?php

                $featured_products = get_products(6);

                $template = $twig->load('featured.html.twig');
                echo $template->render(array(
                    'data'=>'test value',
                    'featured_products'=>$featured_products
                ));

                 ?>

            </div>

            <!--  -->
            <div class="row" id="stories-blog">
                <div class="custom-separate"></div>
                <div class="col-12">
                    <h5 class="text-center">STORIES</h5>
                    <br>
                </div>
                <blog-post
                        v-for="(post, index) in blogStories"
                        v-bind:key="post.id"
                        v-bind:postid="post.id"
                        v-bind:postimage="post.image_address"
                        v-bind:posttitle="post.title"
                        v-bind:postbrief="post.brief_desc"
                        v-bind:postdate="post.published + ' ' + post.date.time">
                </blog-post>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <a href="https://google.co.uk" class="btn btn-primary">
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
