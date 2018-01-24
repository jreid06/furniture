<nav id="nav" class="nav-vue">
    <div class="mobile-login-help d-lg-none">
        <a href="#">help</a>

        <template v-model="loggedInStatus" v-if="!loggedInStatus">
            <a href="/login">signup/login</a>
        </template>
        <template v-else>
            <a href="#" v-on:click="toggleAccountMenu">my account&nbsp;<span class="fa fa-user-o"></span>&nbsp; <span class="fa fa-caret-down"></span> </a>
            <div class="custom-menu custom-menu-closed" aria-labelledby="dropdownMenuLink" v-on:mouseleave="toggleAccountMenu">
                <a class="dropdown-item" href="/myaccount/home">dashboard</a>
                <a class="dropdown-item" href="/myaccount/details">my details</a>
                <a class="dropdown-item" href="/myaccount/addressbook">Address book</a>
                <a class="dropdown-item" href="/myaccount/orders">orders</a>
                <a class="dropdown-item" href="/basket">basket</a>
                <a class="dropdown-item" href="/myaccount/wishlist">wishlist</a>
                <a class="dropdown-item" href="" v-on:click.prevent="logout">sign out</a>
            </div>
        </template>

    </div>
    <div class="d-flex flex-row flex-wrap align-items-center" id="nav-main">
        <div class="p-2 logo-nav order-2 order-md-1">
            <img src="/assets/general/idyl_original_logo_white.png" alt="logo">
            <!-- <h2>LOGO</h2> -->
            <div class="desktop-login-help d-none d-lg-block">

                <template v-model="loggedInStatus" v-if="!loggedInStatus">
                    <a class="dsktp-a" href="#">help</a>
                    <a class="dsktp-a" href="/login">signup/login</a>
                </template>
                <template v-else>
                    <a class="dsktp-a" href="#">help</a>
                    <a class="dsktp-a" href="#" v-on:mouseover="toggleAccountMenu">my account&nbsp;<span class="fa fa-user-o"></span>&nbsp; <span class="fa fa-caret-down"></span> </a>

                    <div class="custom-menu custom-menu-closed" aria-labelledby="dropdownMenuLink" v-on:mouseleave="toggleAccountMenu">
                        <a class="dropdown-item" href="/myaccount/home">dashboard</a>
                        <a class="dropdown-item" href="/myaccount/details">my details</a>
                        <a class="dropdown-item" href="/myaccount/addressbook">address book</a>
                        <a class="dropdown-item" href="/myaccount/orders">orders</a>
                        <a class="dropdown-item" href="/basket">basket</a>
                        <a class="dropdown-item" href="/myaccount/wishlist">wishlist</a>
                        <a class="dropdown-item" href="" v-on:click.prevent="logout">sign out</a>
                    </div>
                </template>

            </div>
        </div>
        <div class="p-2 menu-nav order-1">
            <div class="menu-btn" v-on:click="menuToggle">
                <div class="bar" id="b1"></div>
                <div class="bar" id="b2"></div>
                <div class="bar" id="b3"></div>
            </div>
            <div class="p-2">

            </div>
        </div>
        <div class="p-2 links-nav order-md-2">
            <ul>
                <template v-for="(nav, index) in navHeader">
                    <li v-bind:id="'nav-link-' + index">
                        <a :href="nav.address" >{{ nav.title.toUpperCase() }}</a>
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
                            v-bind:index="index"
                            v-bind:stripeid="item.stripe_id">
                </basket-item>
            </template>
            <template v-else>
                <p class="empty-message">BASKET IS CURRENTLY EMPTY</p>
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
            <hr style="color: #222; width: 70%; margin-left: auto; margin-right: auto; margin-top: 20px;" class="d-md-none">

            <div class="mobile-collection-links d-md-none">
                <h4 class="d-md-none text-center">COLLECTIONS</h4>
                <a href="#" class="btn btn-menu-link">
                    living room
                </a>

                <a href="#" class="btn btn-menu-link">
                    kitchen
                </a>

                <a href="#" class="btn btn-menu-link">
                    bedroom
                </a>

                <a href="#" class="btn btn-menu-link">
                    bath
                </a>

                <hr style="color: #222; width: 70%; margin-left: auto; margin-right: auto; margin-top: 20px;">
                <h4 class="d-md-none text-center">MORE</h4>

                <a href="#" class="btn btn-menu-link">
                    brands
                </a>

                <a href="#" class="btn btn-menu-link">
                    gifts
                </a>

                <a href="#" class="btn btn-menu-link">
                    our story
                </a>

                <hr style="color: #222; width: 70%; margin-left: auto; margin-right: auto; margin-top: 20px;">

                <h4 class="d-md-none text-center">INFO</h4>
                <div class="d-flex flex-wrap flex-row">
                    <div class="p-2 social1">

                    </div>
                    <div class="p-2 social2">

                    </div>
                    <div class="p-2 social3">

                    </div>
                </div>

                <p><a href="mailto:info@nordicidyl.com">info@nordicidyl.com</a> </p>
                <p><a href="tel:02086541456">+44 (0)2086541456</a></p>

            </div>

            <div class="category-list">
                <template v-if="">

                    <div v-if="">
                        <a href="#">SHOP ALL LIVING ROOM PRODUCTS</a>
                    </div>

                </template>


            </div>
            <!-- <div class="d-none d-md-block nav flex-column flex-md-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="vue-livingroom-tab" data-toggle="pill" href="#vue-livingroom" role="tab" aria-controls="vue-livingroom" aria-selected="true">Living Room</a>
                <a class="nav-link" id="vue-kitchen-tab" data-toggle="pill" href="#vue-kitchen" role="tab" aria-controls="vue-kitchen" aria-selected="false">Kitchen</a>
                <a class="nav-link" id="vue-bedroom-tab" data-toggle="pill" href="#vue-bedroom" role="tab" aria-controls="vue-bedroom" aria-selected="false">Bedroom</a>
                <a class="nav-link" id="vue-bath-tab" data-toggle="pill" href="#vue-bath" role="tab" aria-controls="vue-bath" aria-selected="false">Bath</a>
            </div> -->
        </div>

        <div class="p-2 sub-menu d-none d-md-block">
            <!-- <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="vue-livingroom" role="tabpanel" aria-labelledby="vue-livingroom-tab">
                    <template  v-for="livingroom in products.livingroom">
                        <div class="menu-link" v-bind:data-test="livingroom.image">
                            <div>{{capitalizeFirstLetter(livingroom.name)}}</div> <span class="fa fa-chevron-right"></span>
                        </div>
                    </template>

                </div>

                <div class="tab-pane fade" id="vue-kitchen" role="tabpanel" aria-labelledby="vue-kitchen-tab">
                    <template  v-for="kitchen in products.kitchen">
                        <div class="menu-link">
                            <div>{{capitalizeFirstLetter(kitchen)}}</div> <span class="fa fa-chevron-right"></span>
                        </div>
                    </template>
                </div>

                <div class="tab-pane fade" id="vue-bedroom" role="tabpanel" aria-labelledby="vue-bedroom-tab">
                    <template  v-for="bedroom in products.bedroom">
                        <div class="menu-link">
                            <div>{{capitalizeFirstLetter(bedroom)}}</div> <span class="fa fa-chevron-right"></span>
                        </div>
                    </template>
                </div>

                <div class="tab-pane fade" id="vue-bath" role="tabpanel" aria-labelledby="vue-bath-tab">
                    <template  v-for="bath in products.bath">
                        <div class="menu-link">
                            <div>{{capitalizeFirstLetter(bath)}}</div> <span class="fa fa-chevron-right"></span>
                        </div>
                    </template>
                </div>
            </div> -->
        </div>
    </div>

</nav>
