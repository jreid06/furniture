<?php  ?>
<nav id="nav">
    <div class="d-flex flex-row flex-wrap align-items-center" id="nav-main">
        <div class="p-2 logo-nav order-2 order-md-1">
            <!-- <img src="assets/general/logo-placeholder.png" alt="logo"> -->
            <h2>LOGO</h2>
        </div>
        <div class="p-2 menu-nav order-1">
            <div class="menu-btn" v-on:click="menuToggle">
                <div class="bar" id="b1"></div>
                <div class="bar" id="b2"></div>
                <div class="bar" id="b3"></div>
            </div>

        </div>
        <div class="p-2 links-nav order-md-2">
            <ul>
                <template v-for="(nav, index) in navHeader">
                    <li v-bind:id="'nav-link-' + index">
                        <a v-bind:href="nav.address">{{ capitalizeFirstLetter(nav.title) }}</a>
                    </li>
                </template>

            </ul>
            <div class="search-basket-nav">
                <span class="fa fa-search" v-on:click="searchToggle"></span>
                <span class="fa fa-shopping-cart empty" v-on:click="basketToggle"></span>
            </div>
        </div>
        <div class="p-2 search-basket-nav order-3">
            <span class="fa fa-search" v-on:click="searchToggle"></span>
            <span class="fa fa-shopping-cart empty" v-on:click="basketToggle"></span>
        </div>
    </div>
    <div class="search-bar search-hidden">
        <div class="search-input">
            <form id="search-form" @submit.prevent>
                <div class="d-flex flex-row flex-wrap justify-content-start justify-content-sm-end align-items-center">
                    <div class="p-2">
                        <input class="inpField" type="text" name="search-inp" value="" placeholder="search products here ...">
                    </div>
                    <div class="p-2">
                        <span class="fa fa-search" style="cursor: pointer"></span>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="basket-box basket-closed">
        <div class="d-flex flex-row flex-wrap" id="basket-container">
            <div class="p-2 basket-info">
                <span>Items in basket: {{basketCount}} </span>
                <span>Current Total Price: £{{basketTotal.toFixed(2)}} </span>
            </div>
            <!-- add v-if to check if basketHasItems === true or false -->
            <!--    if true show all item in basket -->
            <!--    else show empty basket message  -->
            <template v-if="basketHasItems">
                <basket-item
                            v-for="(item, index) in basket.items"
                            v-bind:key="item.id"
                            v-bind:itemid="item.id"
                            v-bind:quantity="item.quantity"
                            v-bind:productimage="item.prod_image"
                            v-bind:itemname="item.prod_name"
                            v-bind:price="item.price"
                            v-bind:index="index">
                </basket-item>
            </template>
            <template v-else>
                <p class="empty-message">BASKET IS CURRENTLY EMPTY</p>
                <!-- <pre>
                    {{[{"id":1,"category":"livingroom","prod_name":"Kitchen Item 1","description":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.","price":{"gbp":29},"prod_image":"/assets/products/k1.jpg","quantity":1},{"id":2,"category":"kitchen","prod_name":"Kitchen Item 2","description":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.","price":{"gbp":65},"prod_image":"/assets/products/k2.jpg","quantity":1},{"id":3,"category":"bath","prod_name":"Kitchen Item 3","description":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.","price":{"gbp":34},"prod_image":"/assets/products/k3.jpg","quantity":2},{"id":4,"category":"kitchen","prod_name":"Kitchen Item 4","description":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.","price":{"gbp":12},"prod_image":"/assets/products/k4.jpg","quantity":4}]}}
                </pre> -->
            </template>


            <div class="p-2 checkout-info">
                <ul>
                    <li class="total-box">Basket total: <span class="basket-total">£{{basketTotal.toFixed(2)}}</span> </li>
                    <li style="text-align:center">
                        <template v-model="basketHasItems" v-if="basketHasItems">
                            <br>
                            <button class="btn btn-primary"><p>PROCEED TO CHECKOUT</p></button>
                            <button class="btn btn-primary" v-on:click="emptyBasket"><p>EMPTY BASKET <span class="fa fa-trash-o"></span> </p></button>
                        </template>
                        <template v-else>
                            <br>
                            <button class="btn btn-primary"><p>ADD PRODUCTS</p></button>
                        </template>


                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="menu-box d-flex flex-row flex-wrap menu-closed">

        <div class="p-2 main-menu">
            <h4 class="d-md-none">COLLECTIONS</h4>
            <div class="nav flex-column flex-md-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="vue-livingroom-tab" data-toggle="pill" href="#vue-livingroom" role="tab" aria-controls="vue-livingroom" aria-selected="true">Living Room</a>
                <a class="nav-link" id="vue-kitchen-tab" data-toggle="pill" href="#vue-kitchen" role="tab" aria-controls="vue-kitchen" aria-selected="false">Kitchen</a>
                <a class="nav-link" id="vue-bedroom-tab" data-toggle="pill" href="#vue-bedroom" role="tab" aria-controls="vue-bedroom" aria-selected="false">Bedroom</a>
                <a class="nav-link" id="vue-bath-tab" data-toggle="pill" href="#vue-bath" role="tab" aria-controls="vue-bath" aria-selected="false">Bath</a>
            </div>
        </div>
        <div class="p-2 sub-menu">
            <div class="tab-content" id="v-pills-tabContent">
                <!--  -->
                <div class="tab-pane fade show active" id="vue-livingroom" role="tabpanel" aria-labelledby="vue-livingroom-tab">
                    <template  v-for="livingroom in products.livingroom">
                        <div class="menu-link" v-bind:data-test="livingroom.image">
                            <div>{{capitalizeFirstLetter(livingroom.name)}}</div> <span class="fa fa-chevron-right"></span>
                        </div>
                    </template>

                </div>
                <!--  -->
                <div class="tab-pane fade" id="vue-kitchen" role="tabpanel" aria-labelledby="vue-kitchen-tab">
                    <template  v-for="kitchen in products.kitchen">
                        <div class="menu-link">
                            <div>{{capitalizeFirstLetter(kitchen)}}</div> <span class="fa fa-chevron-right"></span>
                        </div>
                    </template>
                </div>
                <!--  -->
                <div class="tab-pane fade" id="vue-bedroom" role="tabpanel" aria-labelledby="vue-bedroom-tab">
                    <template  v-for="bedroom in products.bedroom">
                        <div class="menu-link">
                            <div>{{capitalizeFirstLetter(bedroom)}}</div> <span class="fa fa-chevron-right"></span>
                        </div>
                    </template>
                </div>
                <!--  -->
                <div class="tab-pane fade" id="vue-bath" role="tabpanel" aria-labelledby="vue-bath-tab">
                    <template  v-for="bath in products.bath">
                        <div class="menu-link">
                            <div>{{capitalizeFirstLetter(bath)}}</div> <span class="fa fa-chevron-right"></span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</nav>
