<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
    include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';

 ?>

<div class="container-fluid home basket-home">
    <template v-if="basketHasItems">
        <div class="row">
            <div class="col-12 info-basket-column">
                <div class="alert alert-secondary text-center" role="alert">
                    Your items aren't reserved checkout before they sell out!
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="btn btn-primary">
                    Checkout
                </div>
            </div>
            <div class="col-12">
                <template v-if="true">
                    <basket-item-checkout
                            v-for="(item, index) in basket.items"
                            v-bind:key="item.id"
                            v-bind:itemid="item.id"
                            v-bind:quantity="item.quantity"
                            v-bind:productimage="item.prod_image"
                            v-bind:itemname="item.prod_name"
                            v-bind:price="item.price"
                            v-bind:index="index"
                            v-bind:stripeid="item.stripe_id"
                            v-bind:accprice="item.total_price">
                    </basket-item-checkout>
                </template>
                <template v-else>
                    <div class="">

                    </div>
                </template>
            </div>
            <div class="col-12 text-center">
                <div class="btn btn-primary">
                    Checkout
                </div>
            </div>
        </div>
    </template>
    <template v-else>
        <div class="row">
            <div class="col-12 info-basket-column">
                <div class="alert alert-info text-center" role="alert">
                    Basket is empty. Start shopping today. <a href="/">SHOP NOW</a>
                </div>
            </div>
        </div>
    </template>

</div>

 <?php
    include ROOT_PATH.'templates/footer.php';
 ?>
