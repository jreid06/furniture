
<?php $hidden = false; if ($_SERVER['REQUEST_URI'] === '/checkout'): $hidden = true; ?><?php endif; ?>

<nav id="nav" class="nav-vue" style="<?php if($hidden): ?>visibility: hidden <?php endif; ?>">
    <div class="mobile-login-help d-lg-none">
        <a href="/help">help</a>

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
            <img class="d-lg-none" src="/assets/general/idyl_original_logo_white.png" alt="logo" @click="goHome">
            <!-- <h2>LOGO</h2> -->
            <div class="desktop-login-help d-none d-lg-block">

                <template v-model="loggedInStatus" v-if="!loggedInStatus">
                    <a class="dsktp-a" href="/help">help</a>
                    <a class="dsktp-a" href="/login">signup/login</a>
                </template>
                <template v-else>
                    <a class="dsktp-a" href="/help">help</a>
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
            <div class="menu-btn" data-menu-target="mobile" v-on:click="menuToggle">
                <div class="bar" data-menu-target="mobile" id="b1"></div>
                <div class="bar" data-menu-target="mobile" id="b2"></div>
                <div class="bar" data-menu-target="mobile" id="b3"></div>
            </div>
            <div class="p-2">

            </div>
        </div>
        <div class="p-2 links-nav order-md-2">
            <div class="logo-box">
                <img src="/assets/general/idyl_original_logo_white.png" alt="logo" @click="goHome">
            </div>
            <ul>
                <template v-for="(nav, index) in navHeader">
                    <template v-if="nav.sublinks">
                        <li v-bind:id="'nav-link-' + index" @click="menuToggle" :data-menu-target="nav.slug" :data-nav-info="index">
                            <a href="#" :data-menu-target="nav.slug" :data-nav-info="index" @click.prevent>{{ nav.title.toUpperCase() }}</a>
                        </li>
                    </template>
                    <template v-else>
                        <li v-bind:id="'nav-link-' + index">
                            <a :href="nav.address">{{ nav.title.toUpperCase() }}</a>
                        </li>
                    </template>

                </template>

            </ul>
            <div class="search-basket-nav">
                <span class="fa fa-search" v-on:click="searchToggle"></span>
                <template v-if="window.location.pathname.split('/')[2] === 'user' || window.location.pathname.split('/')[2] === 'guest'">
                    <span class="fa fa-shopping-cart empty disabled"></span>
                </template>
                <template v-else>
                    <span class="fa fa-shopping-cart empty" v-on:click="basketToggle"></span>
                </template>

            </div>
        </div>
        <div class="p-2 search-basket-nav order-3">
            <span class="fa fa-search" v-on:click="searchToggle"></span>
            <template v-if="window.location.pathname.split('/')[2] === 'user' || window.location.pathname.split('/')[2] === 'guest'">
                <span class="fa fa-shopping-cart empty disabled" style="cursor: not-allowed "></span>
            </template>
            <template v-else>
                <span class="fa fa-shopping-cart empty" v-on:click="basketToggle"></span>
            </template>
        </div>
    </div>
    <div class="search-bar search-hidden">
        <div class="search-input">
            <form id="search-form" @submit.prevent>
                <div class="d-flex flex-row flex-wrap justify-content-start justify-content-sm-end align-items-center">
                    <div class="p-2">
                        <input class="inpField" type="text" name="search-inp" value="" placeholder="search product types here ..." v-on:keyup="searchFilter" id="searchInput">
                    </div>
                </div>

            </form>
        </div>
        <div class="search-listings">
            <template v-if="menuStatus.navloaded">
                <ul class="list-group list-group-flush search-listing-values">
                    <template v-for="(type, index) in searchListing.categories">
                            <li class="list-group-item">
                                <a :href="'/products/'+type.cat+'/'+type.slug">{{type.name}} <span class="text-muted text-italic">({{type.cat}})</span></a>
                            </li>
                    </template>
                </ul>
            </template>

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
                            v-bind:key="item.stripesku_id"
                            v-bind:itemid="item.stripesku_id"
                            v-bind:quantity="item.quantity"
                            v-bind:productimage="item.prod_image"
                            v-bind:itemname="item.prod_name"
                            v-bind:price="item.price"
                            v-bind:index="index"
                            v-bind:prodcolor="item.prod_tags.color"
                            v-bind:prodsize="item.prod_tags.size">
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
                            <a href="/basket" class="btn btn-primary" style="margin-bottom: 10px;"><p>PROCEED TO CHECKOUT</p></a>
                            <br>
                            <button class="btn btn-primary" v-on:click="emptyBasket"><p>EMPTY BASKET <span class="fa fa-trash-o"></span> </p></button>
                        </template>
                        <template v-else>
                            <br>
                            <a href="/products" class="btn btn-primary"><p>ADD PRODUCTS</p></a>
                        </template>


                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="menu-box d-flex flex-row flex-wrap menu-closed">

        <div class="p-2 main-menu">
            <!-- <hr style="color: #222; width: 70%; margin-left: auto; margin-right: auto; margin-top: 20px;" class="d-md-none"> -->

            <div class="mobile-collection-links d-lg-none">

                <h4 class="d-md-none text-center">COLLECTIONS</h4>
                <a v-for="navlink in navHeader" :href="'/products/'+navlink.slug" class="btn btn-menu-link">
                    {{navlink.title}}
                </a>

                <br>
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

            <!-- NOTE: living room -->

            <template v-if="menuStatus.selected">
                <div class="category-list d-none d-lg-block">
                    <div class="content-livingroom-nav d-flex flex-wrap flex-row">
                        <div class="p-2">
                            <dl class="dl-box-nav">
                                <div class="dl-box-content-nav">
                                    <h4>SHOP BY PRODUCT</h4>
                                    <ul>
                                        <template v-for="(product, index) in menuStatus.selected_nav.links">
                                            <template v-if="index === 0">
                                                <li class="nav-menu-link" id="link-static">
                                                    <a :href="'/products/'+product.cat">All</a>
                                                </li>
                                                <li class="nav-menu-link" :id="'link'+(index+1)">
                                                    <a :href="'/products/'+product.cat+'/'+product.slug">{{product.title}}</a>
                                                </li>
                                            </template>
                                            <template v-else>
                                                <li class="nav-menu-link" :id="'link'+(index+1)">
                                                    <a :href="'/products/'+product.cat+'/'+product.slug">{{product.title}}</a>
                                                </li>
                                            </template>

                                        </template>

                                    </ul>
                                </div>
                            </dl>
                        </div>

                        <div class="p-2">

                            <template v-for="(cta, index) in menuStatus.selected_nav.cta_boxes">
                                <div :class="'nav-box box-'+index" :style="'background: url('+cta.image+')'">
                                    <div class="cta-content">
                                        <div class="cta-overlay">

                                        </div>
                                        <h4 class="cta-item cta-title">{{cta.title}}</h4>
                                        <p class="cta-item cta-msg">{{cta.message}}</p>
                                        <p class="cta-item cta-link"><a :href="cta.link" class="btn btn-cta">SHOP NOW</a> </p>
                                    </div>
                                </div>
                            </template>

                            <div class="close-menu" data-menu-target="livingroom" v-on:click="closeMenu">
                                <span class="fa fa-close" data-menu-target="livingroom"></span>
                            </div>
                        </div>
                    </div>


                </div>
            </template>

        </div>
    </div>

</nav>
<div class="loader-screen loader-generic">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>

<!-- <div class="test div" style="position: absolute; background-color: green; z-index: 100000;">
    <h1 id="test-btn" class="btn btn-info">debug</h1>
</div> -->
