<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
 ?>

    <div class="container-fluid home brands-home" style="">

        <h3 class="text-center" style="margin-top: 10px;">Brands</h3>

        <div class="row">

            <?php

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

                $template = $twig->load('brands-main.html.twig');
                echo $template->render(array(
                    'brands'=>$brand_parsed_data
                ));
             ?>
            <!-- <template v-for="(brandobj, index) in brands">

                <div class="col-12 col-sm-6 col-lg-4">
                    <br>
                    <h4>{{ brandobj.letter.toUpperCase() }}</h4>

                    <ul class="list-group list-group-flush">
                    <template v-for="(brand, index) in brandobj.brand_array">
                        <li class="list-group-item brand-title-listing">
                            <a :href="'/products/brand/'+brand.createSlug()">{{ brand.name }}</a>
                        </li>
                    </template>
                    </ul>

                    <br>
                    <br>
                </div>

            </template> -->
        </div>


    </div>

 <?php
 	include ROOT_PATH.'templates/footer.php';
  ?>
