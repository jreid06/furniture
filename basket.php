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
                    <?php if (!isset($_SESSION['idyl_tkn']) && !isset($_COOKIE['idyl_tkn'])): ?>
                        <a href="#" data-href="/checkout/guest" @click.prevent="setPaymentCookie">checkout</a>
                    <?php else: ?>
                        <a href="#" data-href="/checkout/user/<?=isset($_SESSION['idyl_str_id'])?$_SESSION['idyl_str_id']:$_COOKIE['idyl_str_id'];?>" @click.prevent="setPaymentCookie">Checkout</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12">
                <basket-item-checkout
                        v-for="(item, index) in basket.items"
                        v-bind:key="item.stripesku_id"
                        v-bind:itemid="item.stripesku_id"
                        v-bind:quantity="item.quantity"
                        v-bind:productimage="item.prod_image"
                        v-bind:itemname="item.prod_name"
                        v-bind:price="item.price"
                        v-bind:index="index"
                        v-bind:prodcolor="item.prod_tags.color"
                        v-bind:prodsize="item.prod_tags.size">
                </basket-item-checkout>
            </div>
            <div class="col-12">
                <h5 class="text-center">Subtotal: £{{basketTotal.toFixed(2)}}</h5>
                <p class="text-muted text-center">Click chekout to see Shipping Prices & update Delivery Details</p>
            </div>
            <div class="col-12 text-center">
                <hr>
                <div class="btn btn-primary">
                    <?php if (!isset($_SESSION['idyl_tkn']) && !isset($_COOKIE['idyl_tkn'])): ?>
                        <a href="#" data-href="/checkout/guest" @click.prevent="setPaymentCookie">checkout</a>
                    <?php else: ?>
                        <a href="#" data-href="/checkout/user/<?=isset($_SESSION['idyl_str_id'])?$_SESSION['idyl_str_id']:$_COOKIE['idyl_str_id'];?>" @click.prevent="setPaymentCookie">Checkout</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </template>
    <template v-else>
        <div class="row">
            <div class="col-12 info-basket-column">

                    <div class="loader-screen visible">
                        <div class="spinner">
                            <div class="double-bounce1"></div>
                            <div class="double-bounce2"></div>
                        </div>
                    </div>

                    <div class="alert alert-info text-center basket-alert" role="alert">
                        Basket is empty. Start shopping today. <a href="/products">SHOP NOW</a>
                    </div>

            </div>
        </div>
    </template>

</div>

 <?php
    include ROOT_PATH.'templates/footer.php';
 ?>
