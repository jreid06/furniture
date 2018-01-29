(function() {
    'use strict';
    // this function is strict...
}());


$(document).ready(function() {

    // stripe js code
    if (window.location.pathname === '/myaccount/home') {
        console.log('true');
        $('footer').addClass('d-none');
    }

    if (window.location.pathname === '/basket' || window.location.pathname.split('/')[1] === 'product') {
        var handler = StripeCheckout.configure({
            key: 'pk_test_o1lkn4I74t5tIEB8rdzKbCtp',
            image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
            locale: 'auto',
            token: function(token, args) {
                // You can access the token ID with `token.id`.
                // Get the token ID to your server-side code for use.
                console.log('test');
                console.log(token.id);
                console.log(token.email);
                console.log(args);

                paymentPromise(token.id);
            }
        });
    }


    // Close Checkout on page navigation:
    window.addEventListener('popstate', function() {
        handler.close();
    });

    function paymentPromise(stripetoken) {

        // We make a new promise: we promise a numeric count of this promise, starting from 1 (after waiting 3s)
        let p1 = new Promise(
            // The resolver function is called with the ability to resolve or
            // reject the promise
            (resolve, reject) => {
                $.ajax({
                    url: '/scripts/create.php',
                    type: 'post',
                    data: {
                        token: stripetoken,
                        basket: JSON.stringify($nav_vue.basket.items)
                    },
                    success: function(data) {
                        let $data = JSON.parse(data);

                        resolve($data);
                    },
                    error: function() {
                        reject('ajax unsuccessful')
                    }
                })
            }
        );

        // We define what to do when the promise is resolved with the then() call,
        // and what to do when the promise is rejected with the catch() call
        p1.then(
                // Log the fulfillment value
                function(val) {
                    console.log(val);
                })
            .catch(
                // Log the rejection reason
                (reason) => {
                    console.log(reason);
                });
    };

    // stripe js code

    setTimeout(function() {
        console.log('classes should be added');
        $('#featuredproduct-4').addClass('d-none d-lg-block');
        $('#featuredproduct-5').addClass('d-none d-lg-block');
    }, 400);

    function removeCollapseClass() {
        if ($(window).width() > 767) {
            if ($('.footer-collapse').hasClass('collapse')) {
                $('.footer-collapse').removeClass('collapse');
            }

            $('.collapse-link').attr('data-toggle', 'false');

        }
    }

    removeCollapseClass();

    $(window).resize(function() {
        if ($(window).width() < 768) {
            if (!$('.footer-collapse').hasClass('collapse')) {
                $('.footer-collapse').addClass('collapse');
            }

            // reset the tabs to toggle on click
            $('.collapse-link').attr('data-toggle', 'collapse');

            // hide last 2 products when screen is less that desktop
            $('#featuredproduct-4').addClass('d-none d-lg-block');
            $('#featuredproduct-5').addClass('d-none d-lg-block');
        }

        if ($(window).width() > 768) {
            if ($('.footer-collapse').hasClass('collapse')) {
                $('.footer-collapse').removeClass('collapse');
            }

            $('.collapse-link').attr('data-toggle', 'false');
        }
    })

    function shakeShoppingIcon() {
        let shoppingIcon = $('.search-basket-nav').find('.fa-shopping-cart');
        shoppingIcon.addClass('animated3 tada');

        setTimeout(function() {
            shoppingIcon.removeClass('tada');
        }, 1200);
    }

    Vue.component('slideshow', {
        data: function() {
            return {
                status: 'component works'
            };
        },
        template: `<div class="slideshow-div justify-content-center align-items-center" v-bind:style="{background: 'url(' + image + ')'}">

            <h2>HOME ESSENTIALS</h2>
            <h4>RECLAIM YOUR HOME</h4>
            <a class="btn btn-primary" href="#">SHOP NOW</a> </div>`,
        props: ['image']
    });

    Vue.component('category', {
        data: function() {
            return {
                status: 'component works'
            }
        },
        template: `<div class="col-6 col-md-3 col-lg-3">
            <a v-bind:href="categorylink">
            <div class="card category-card" v-bind:id="'cat-'+num">
            <div class="card-img-bgrnd d-flex justify-content-center align-items-center" v-bind:style="{background: 'url(' + image + ')'}">
                <p class="card-text">{{capitalizeFirstLetter(categoryname)}}</p>
            </div>
            </div></a></div>`,
        props: ['categoryname', 'image', 'num', 'categorylink'],
        methods: {
            capitalizeFirstLetter: function(string) {
                let splitStr = string.split(' ');
                if (splitStr.length > 1) {
                    for (var i = 0; i < splitStr.length; i++) {
                        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].slice(1);
                    }
                    return splitStr.join(' ');
                } else {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }

            }
        }
    });

    let basketItem = {
        data: function() {
            return {
                status: 'component works'
            }
        },
        template: `<div class="p-2" v-bind:id="'basket-item-'+index">
                <div class="item" v-bind:data-item-id="itemid" v-bind:data-s-id="itemid">
                    <img v-bind:src="productimage" class="item-image" alt="product image">
                    <div id="item-details">
                        <h4>{{itemname}} - {{capitalizeFirstLetter(prodcolor)}} - {{capitalizeFirstLetter(prodsize)}}</h4>
                        <p>Quantity: <span>{{quantity}}</span> </p>
                        <p>Price: <span>£{{price.toFixed(2)}}</span> </p>
                        <p class="acc-total" v-if="quantity > 1">Accumilated total: <span>£{{price*quantity.toFixed(2)}}</span></p>
                    </div>
                    <div class="item-delete" v-bind:data-position-id="index" v-bind:data-element-id="'basket-item-'+index">
                        <span class="fa fa-trash-o" v-bind:id="itemid" v-on:click="removeItem"></span>
                    </div>
                </div>
            </div>`,
        methods: {
            capitalizeFirstLetter: function(string) {
                let splitStr = string.split(' ');
                if (splitStr.length > 1) {
                    for (var i = 0; i < splitStr.length; i++) {
                        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].slice(1);
                    }
                    return splitStr.join(' ');
                } else {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }

            },
            removeItem: function(e) {
                console.log('item removed');
                console.log(e.target);

                // getting the correct items details from the basket array
                let itemID = parseInt($(e.target).parent().attr('data-position-id'))
                    itemrowID = '#' + $(e.target).parent().attr('data-element-id'),
                    selectedItem = $nav_vue.basket.items[itemID];

                console.log(selectedItem.total_price);

                /*
                    1.-------
                     1.0 adjust basket item counter (counter - 1)
                     2.0 adjust price accordingly (basketTotal - itemTotal())
                    2. delete the element from the basket (p-2 #basket-item-$1)
                    3. remove item from array

                */

                if (selectedItem.quantity > 1) {

                    selectedItem.quantity -= 1;
                    selectedItem.total_price -= selectedItem.price;
                    $nav_vue.basketTotal -= selectedItem.price;

                    localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                } else {

                    if ($nav_vue.basketCount === 1) {
                        $nav_vue.emptyBasket();
                        return;
                    }
                    $nav_vue.basketCount -= 1;
                    $nav_vue.basketTotal -= selectedItem.total_price;

                    console.log(itemrowID);
                    console.log(itemID);

                    $(itemrowID).fadeOut().remove();

                    // delete from array
                    console.log($nav_vue.basket.items);
                    $nav_vue.basket.items.splice(itemID, 1);
                    console.log($nav_vue.basket.items);

                    localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));
                }

                // $nav_vue.basket.deletedItems.push($nav_vue.basket.items.splice(itemID,1));
                // console.log($nav_vue.basket.deletedItems);
                // update local storage basket object
            }
        },
        props: ['itemid', 'itemname', 'productimage', 'quantity', 'price', 'index', 'prodcolor', 'prodsize']
    };

    Vue.component('blog-post', {
        data: function() {
            return {
                status: 'component connected'
            }
        },
        template: `<div class="col-12 col-sm-6 col-lg-4">
                <div class="card blog-post-card" :data-post-id="postid">
                <div class="card-img-bgrnd" :style="{background: 'url(' + postimage + ')'}"></div>
                  <div class="card-body">
                    <h4 class="card-title">{{posttitle}}</h4>
                    <p class="card-text">{{postbrief}}</p>
                    <a href="#">
                        READ MORE >
                    </a>
                  </div>
                </div>
            </div>`,
        props: ['postid', 'postimage', 'posttitle', 'postbrief', 'postdate']
    })

    Vue.component('featured', {
        data: function() {
            return {
                status: 'component works'
            }
        },
        template: `<div class="col-6 col-sm-3 col-lg-2" :data-product-link="'/product/'+productcat+'/'+productcattype+'/'+productnameslug+'-'+productcolorslug+'-'+productsizeslug+'/'+productid+'/'+productskuid" v-bind:id="'featuredproduct-'+indexkey" @click="gotoProduct">
                <div class="card featured-prod-card" :data-product-id="productid">
                <div class="card-img-bgrnd" :style="{background: 'url(' + productimage + ')'}"></div>
                  <div class="card-body">
                    <h4 class="card-title"><a :href="'/product/'+productcat+'/'+productcattype+'/'+productnameslug+'-'+productcolorslug+'-'+productsizeslug+'/'+productid+'/'+productskuid">{{producttitle}} - {{capitalizeFirstLetter(productcolorslug)}}-{{capitalizeFirstLetter(productsizeslug)}}</a></h4>
                    <p class="card-text">£{{(productprice/100).toFixed(2)}}</p>
                  </div>
                </div>
            </div>`,
        props: ['productid', 'productskuid','productimage', 'producttitle', 'productprice', 'indexkey', 'productcattype', 'productcat', 'productnameslug', 'productcolorslug', 'productsizeslug'],
        methods:{
            gotoProduct: function(e){
                let eventTrigger = $(e.target);
                console.log(eventTrigger);
            },
            capitalizeFirstLetter: function(string) {
                let splitStr = string.split(' ');
                if (splitStr.length > 1) {
                    for (var i = 0; i < splitStr.length; i++) {
                        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].slice(1);
                    }
                    return splitStr.join(' ');
                } else {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }

            }
        }
    })

    let $nav_vue = new Vue({
        el: '.nav-vue',
        components: {
            'basket-item': basketItem
        },
        data: {
            testData: 'work',
            menuStatus: {
                open: false,
                mobile: false,
                livingroom: false,
                kitchen: false,
                bedroom: false,
                bath: false,
                menuName: ''
            },
            searchStatus: false,
            basketStatus: false,
            basketHasItems: false,
            basketCount: 0,
            basketTotal: 0,
            navHeader: [{
                    address: '#',
                    title: 'living room',
                    slug: 'livingroom'
                },
                {
                    address: '#',
                    title: 'kitchen',
                    slug: 'kitchen'
                },
                {
                    address: '#',
                    title: 'bedroom',
                    slug: 'bedroom',
                },
                {
                    address: '#',
                    title: 'bath',
                    slug: 'bath'
                },
                {
                    address: '/brands',
                    title: 'brands'
                },
                {
                    address: '/product/livingroom/sofas/3-seater-clic-clac-sofa-bed-in-turquoise-blue/7573f9a381d51775LIV#',
                    title: 'gifts'
                },
                {
                    address: '/our-story',
                    title: 'our story'
                }
            ],
            loggedInStatus: false,
            accountMenu: false,
            wishlist: {
                status: false,
                totalItems: 0,
                items: []
            },
            basket: {
                items: []
            },
            // NOTE rename to product category item types
            products: {
                livingroom: [{
                        name: 'candle holders',
                        slug: 'candle-holders',
                        cat: 'livingroom',
                        image: '/assets/main/dust_scratches.png'
                    },
                    {
                        name: 'plaids',
                        slug: 'plaids',
                        cat: 'livingroom',
                        image: '/assets/main/dust_scratches.png'
                    },
                    {
                        name: 'cushions',
                        slug: 'cushions',
                        cat: 'livingroom',
                        image: '/assets/main/dust_scratches.png'
                    },
                    {
                        name: 'lamps',
                        slug: 'lamps',
                        cat: 'livingroom',
                        image: '/assets/main/dust_scratches.png'
                    },
                    {
                        name: 'nips',
                        slug: 'nips',
                        cat: 'livingroom',
                        image: '/assets/main/dust_scratches.png'
                    },
                    {
                        name: 'posters',
                        slug: 'posters',
                        cat: 'livingroom',
                        image: '/assets/main/dust_scratches.png'
                    },
                    {
                        name: 'shelves',
                        slug: 'shelves',
                        cat: 'livingroom',
                        image: '/assets/main/dust_scratches.png'
                    },
                    {
                        name: 'pots',
                        slug: 'pots',
                        cat: 'livingroom',
                        image: '/assets/main/dust_scratches.png'
                    }
                ],
                kitchen: [
                    {
                        name: 'kitchen textiles',
                        slug: 'kitchen-textiles',
                        cat: 'kitchen',
                        image: ''
                    },
                    {
                        name: 'dining',
                        slug: 'dining',
                        cat: 'kitchen',
                        image: ''
                    },
                    {
                        name: 'cook',
                        slug: 'cook',
                        cat: 'kitchen',
                        image: ''
                    }
                ],
                bedroom: [
                    {
                        name: 'bed linen',
                        slug: 'bed-linen',
                        cat: 'bedroom',
                        image: ''
                    },
                    {
                        name: 'Bedroom cushions',
                        slug: 'bedroom-cushions',
                        cat: 'bedroom',
                        image: ''
                    },
                    {
                        name: 'lamps',
                        slug: 'lamp',
                        cat: 'bedroom',
                        image: ''
                    },
                    {
                        name: 'nips',
                        slug: 'nips',
                        cat: 'bedroom',
                        image: ''
                    },
                    {
                        name: 'poster',
                        slug: 'poster',
                        cat: 'bedroom',
                        image: ''
                    }
                ],
                bath: [
                    {
                        name: 'towel',
                        slug: 'towel',
                        cat: 'bath',
                        image: ''
                    },
                    {
                        name: 'shower curtains',
                        slug: 'shower-curtains',
                        cat: 'bath',
                        image: ''
                    },
                    {
                        name: 'accessories',
                        slug: 'accessories',
                        cat: 'bath',
                        image: ''
                    }
                ]
            }
        },
        mounted: function() {
            let $vm = this;
            if ($(window).width < 768) {
                $('.menu-link').each(function(i, item) {
                    $item = $(item);
                    // console.log(item);
                    if ($item.attr('data-test')) {
                        $item.css({
                            "background": `url(${$item.attr('data-test')})`,
                            "background-size": "cover",
                            "background-position": "center"
                        });
                    }

                });
            }

            // $('#nav-link-0').on('click', function() {
            //     console.log('clicked collection link');
            //     $vm.menuToggle();
            //     if ($vm.menuStatus) {
            //         $(this).addClass('active-nav-link');
            //     } else {
            //         $(this).removeClass('active-nav-link');
            //     }
            // })


            this.checkBasketSession();
            this.checkSigninCookies();
            this.checkSigninSession();
        },
        created: function() {


        },
        watch: {
            accountMenu: function(value){
                if (value) {
                    $('.custom-menu').removeClass('custom-menu-closed').addClass('custom-menu-open');
                }else {
                    $('.custom-menu').removeClass('custom-menu-open').addClass('custom-menu-closed');
                }
            },
            loggedInStatus: function(value) {
                if (value) {
                    console.log('user logged in successfully');
                }
            },
            basketCount: function(value) {
                console.log('basket updated');
                // $user_vue.basketCount = value;

                if (value > 0) {
                    this.basketHasItems = true;
                    $('.fa-shopping-cart').removeClass('empty').addClass('hasItems');
                } else {
                    this.basketHasItems = false;
                    $('.fa-shopping-cart').removeClass('hasItems').addClass('empty');
                }

            },
            // menuStatus: function(value) {
                // if (!value) {
                //     console.log('MENU IS CLOSING');
                //     $('#b2').animate({
                //         opacity: 1
                //     }, 300);
                //
                //     $('#b1').rotate({
                //         angle: 43.5,
                //         center: ["10%", "50%"],
                //         animateTo: 0
                //     });
                //
                //     $('#b3').rotate({
                //         angle: -42,
                //         center: ["10%", "70%"],
                //         animateTo: 0
                //     });
                //
                //     $('.menu-box').removeClass('menu-open').addClass('menu-closed');
                // } else if (value) {
                //     console.log('MENU IS OPENING');
                //     $('#b2').animate({
                //         opacity: 0
                //     }, 200);
                //
                //     $('#b1').rotate({
                //         angle: 0,
                //         center: ["10%", "50%"],
                //         animateTo: 43.5
                //     });
                //
                //     $('#b3').rotate({
                //         angle: 0,
                //         center: ["10%", "70%"],
                //         animateTo: -42
                //     });
                //
                //     $('.menu-box').removeClass('menu-closed').addClass('menu-open');
                //
                //     let basketStatus = this.basketStatus;
                //     if (basketStatus) {
                //         this.basketStatus = !this.basketStatus;
                //     }
                // }
            // },
            searchStatus: function(value) {
                if (!value) {
                    $('.search-bar').removeClass('search-open').addClass('search-hidden');
                    $('.fa-search').removeClass('f-active');

                    $('.search-input').animate({
                        opacity: 0
                    }, 300);
                } else if (value) {
                    $('.search-input').animate({
                        opacity: 1
                    }, 1000);

                    $('.search-bar').removeClass('search-hidden').addClass('search-open');
                    $('.fa-search').addClass('f-active');

                }
            },
            basketStatus: function(value) {
                let $vm = this;

                if (!value) {
                    $('.basket-box').removeClass('basket-open').addClass('basket-closed');
                    $('.fa-shopping-cart').removeClass('f-bskt-active');

                    $('#basket-container').animate({
                        opacity: 0
                    }, 300);
                }
                else if (value) {
                    $vm.checkBasketSession();
                    $('#basket-container').animate({
                        opacity: 1
                    }, 1000);

                    $('.basket-box').removeClass('basket-closed').addClass('basket-open');
                    $('.fa-shopping-cart').addClass('f-bskt-active');

                    console.log("Menu Status: " + this.menuStatus.open);
                    let menuStatus = this.menuStatus.open;
                    if (menuStatus) {
                        this.menuStatus.open = !this.menuStatus.open;

                        switch (this.menuStatus.menuName) {
                            case 'mobile':
                                this.menuStatus.mobile = !this.menuStatus.mobile
                                break;
                            default:

                        }
                        console.log("Current Menu Status: " + this.menuStatus.open);
                        $('#nav-link-0').removeClass('active-nav-link');
                    }
                }
            }
        },
        computed: {

        },
        methods: {
            goHome: function(){
                window.location = '/';
            },
            toggleAccountMenu: function(){
                console.log('item toggled');
                this.accountMenu = !this.accountMenu;
                console.log(this.accountMenu);
            },
            checkItemExists: function(bsktItms, newItem) {
                console.log(bsktItms);
                for (var i = 0; i < bsktItms.length; i++) {
                    console.log(bsktItms[i]);
                    if (newItem.stripesku_id === bsktItms[i].stripesku_id) {
                        return [true, bsktItms[i], i];
                    }
                }

                return [false];
            },
            initializeWishlist: function(){
                // get basket items from local storage
                // localStorage.getItem('basket', );
                let wishListExists = (localStorage.getItem('idyl-wishlist')) ? true : false;

                if (wishListExists && this.loggedInStatus) {
                    let wishlistItems = JSON.parse(localStorage.getItem('idyl-wishlist'));

                    if (window.location.pathname.split('/')[1] === 'product') {
                        let productid = window.location.pathname.split('/')[5];

                        if (typeof productid === 'string') {
                            for (var i = 0; i < wishlistItems.length; i++) {
                                // if an item in wishlist matches current item add class to heart
                                if (wishlistItems[i].product_id === productid) {
                                    console.log('THIS ITEM IS IN WISHLIST. HEART SHOULD BE BLACK');

                                    $('.wishlist-heart-icon').removeClass('fa-heart-o').addClass('fa-heart');
                                }
                                this.wishlist.items.push(wishlistItems[i]);
                                this.wishlist.totalItems += 1;
                            }
                        }

                    }else {
                        for (var i = 0; i < wishlistItems.length; i++) {
                            this.wishlist.items.push(wishlistItems[i]);
                            this.wishlist.totalItems += 1;
                        }
                    }

                    // set the wishlist counter to equal num of items in wishlist array
                    let wishlistLength = wishlistItems.length;
                    this.wishlist.totalItems = wishlistLength;



                }else {
                    console.log('no wishlist items in local storage');
                }

            },
            activatewishlist: function() {
                let $vm = this;
                if (!this.wishlist.status) {
                    this.wishlist.status = !this.wishlist.status;
                    console.log('wishlist activated');
                    $vm.initializeWishlist();
                } else {
                    console.log('wishlist not activated');
                }
            },
            deactivatewishlist: function() {
                if (this.wishlist.status) {
                    this.wishlist.status = !this.wishlist.status;
                    console.log('wishlist deactivated');
                } else {
                    console.log('wishlist not activated');
                }
            },
            logout: function() {
                if (this.loggedInStatus) {
                    let $vm = this;

                    $.ajax({
                        type: 'post',
                        url: '/scripts/logout.php',
                        data: {
                            type: 'logout'
                        },
                        success: function(data) {
                            let $data = JSON.parse(data);

                            switch ($data.status.code) {
                                case (101 || '101'):
                                    // success
                                    console.log('SUCCESS');
                                    // change to false to update DOM to reflect changes
                                    $vm.loggedInStatus = !$vm.loggedInStatus;

                                    // change wishlist ability to false
                                    $vm.deactivatewishlist();

                                    window.location = '/';

                                    break;
                                case (404 || '404'):
                                    // error
                                    $.notify($data.data.msg, 'error');
                                    break;
                                default:

                            }

                        },
                        error: function() {

                        }
                    })
                } else {
                    console.log('not logged in. so you cant log out');
                }

            },
            checkSigninCookies() {
                console.log('check cookies run');
                if (Cookies.get('idyl_tkn')) {
                    console.log('user should be signed in');
                    if (!this.loggedInStatus) {
                        this.loggedInStatus = true;

                        this.activatewishlist();
                    }
                } else {
                    console.log('COOKIES NOT CREATED');
                    this.loggedInStatus = false;
                }
            },
            checkSigninSession: function() {
                console.log('check session run');
                $.ajax({
                    type: 'get',
                    url: '/scripts/checksessions.php',
                    success: function(data) {
                        let $data = JSON.parse(data),
                            $vm = this;

                        console.log($data);

                        switch ($data.status.code) {
                            case (101 || '101'):
                                // success
                                if (!$vm.loggedInStatus) {
                                    $nav_vue.loggedInStatus = true;
                                    $nav_vue.activatewishlist();
                                }
                                break;
                            case (404 || '404'):
                                // error
                                console.log('SESSIONS NOT CREATED');

                                break;
                            default:

                        }

                    },
                    error: function() {
                        console.log('error checking if session token exists');
                    }
                })
            },
            emptyBasket: function() {
                let basketLength = this.basket.items.length;

                // reset totals back to 0
                this.basketCount -= basketLength;
                this.basketTotal = 0;

                // delete all items from array
                this.basket.items.splice(0, basketLength);

                localStorage.removeItem('basket');

                console.log('basket cleared');
            },
            setBasketTotal: function() {
                let basketItem = this.basket.items,
                    basketTotal = 0;
                for (var i = 0; i < basketItem.length; i++) {
                    basketTotal += basketItem[i].total_price;
                }

                // update the data basket total
                this.basketTotal = basketTotal;
            },
            checkBasketSession: function() {
                let itemsExist = (localStorage.getItem('basket')) ? true : false,
                    $vm = this;

                console.log("EXISTS: "+ itemsExist);
                if (itemsExist) {
                    let option = {
                        action: 'render'
                    }
                    $vm.initializeBasket(option);
                } else {
                    let option = {
                        action: 'init'
                    }
                    $vm.initializeBasket(option);
                    // return false;
                }
            },
            initializeBasket: function(option) {
                if (option.action === 'render') {
                    // change setting of basketHasItems to true
                    this.basketHasItems = true;

                    // get basket items from local storage
                    // localStorage.getItem('basket', );
                    this.basket.items.splice(0, this.basket.items.length);
                    console.log('reset basket items before pulling from local storage');
                    let basketItems = JSON.parse(localStorage.getItem('basket'));

                    console.log(basketItems);
                    for (var i = 0; i < basketItems.length; i++) {
                        this.basket.items.push(basketItems[i]);
                    }

                    // set the basket counter to equal num of items in basket
                    let basketLength = basketItems.length;
                    this.basketCount = basketLength;

                    // calculate total for basket
                    this.setBasketTotal();
                }

                if (option.action === 'init') {
                    // checks to see if basket had already been set
                    if (this.basketHasItems) {
                        this.basketCount = 0;
                        this.basket.items.splice(0, this.basket.items.length);
                        this.basketTotal = 0;
                    }

                    return;
                }

            },
            capitalizeFirstLetter: function(string) {
                let splitStr = string.split(' ');
                if (splitStr.length > 1) {
                    for (var i = 0; i < splitStr.length; i++) {
                        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].slice(1);
                    }
                    return splitStr.join(' ');
                } else {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }

            },
            closeMenu: function(e){
                let target = $(e.target)[0].attributes[0].nodeValue,
                    $vm = this;

                console.log(target);
                switch (target) {
                    case 'livingroom':
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        setTimeout(function(){
                            $vm.menuStatus.livingroom = false;
                        }, 500);
                        break;
                    case 'bedroom':
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        setTimeout(function(){
                            $vm.menuStatus.bedroom = false;
                        }, 500);
                        break;
                    case 'bath':
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        setTimeout(function(){
                            $vm.menuStatus.bath = false;
                        }, 500);
                        break;
                    case 'kitchen':
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        setTimeout(function(){
                            $vm.menuStatus.kitchen = false;
                        }, 500);
                        break;
                    default:

                }
            },
            menuToggle: function(e) {
                let menuLinkClicked = $(e.target),
                    menuLinkName = menuLinkClicked[0].attributes['data-menu-target'].nodeValue,
                    $vm = this;

                console.log(menuLinkName);
                this.menuStatus.menuName = menuLinkName;
                switch (menuLinkName) {
                    case 'mobile':
                        if (!$vm.menuStatus.mobile) {
                            // open menu
                            $vm.menuStatus.open = !$vm.menuStatus.open;

                            // set menu content to be mobile
                            $vm.menuStatus.mobile = !$vm.menuStatus.mobile;


                           // open menu js

                        }
                        else {
                            // close menu
                            $vm.menuStatus.open = !$vm.menuStatus.open;

                            $vm.menuStatus.mobile = !$vm.menuStatus.mobile;

                        }

                        break;
                    case 'livingroom':
                        console.log('livingroom toggled');
                        // open menu if its not already open
                        if (!$vm.menuStatus.open) {
                            $vm.menuStatus.open = !$vm.menuStatus.open;
                        }

                        // reset all other menu status values
                        $vm.menuStatus.mobile = false;
                        $vm.menuStatus.kitchen = false;
                        $vm.menuStatus.bath = false;
                        $vm.menuStatus.bedroom = false;

                        // show living room menu information
                        if ($vm.menuStatus.livingroom) {
                            $vm.menuStatus.open = !$vm.menuStatus.open;

                            // stops menu info disappearing before menu has closed fully
                            setTimeout(function(){
                                $vm.menuStatus.livingroom = !$vm.menuStatus.livingroom;
                            }, 500);
                        }else {
                            $vm.menuStatus.livingroom = !$vm.menuStatus.livingroom;
                        }


                        break;
                    case 'kitchen':

                        console.log('kitchen toggled');
                        // open menu if its not already open
                        if (!$vm.menuStatus.open) {
                            $vm.menuStatus.open = !$vm.menuStatus.open;

                        }

                        // reset all other menu status values
                        $vm.menuStatus.mobile = false;
                        $vm.menuStatus.livingroom = false;
                        $vm.menuStatus.bath = false;
                        $vm.menuStatus.bedroom = false;

                        // show living room menu information
                        if ($vm.menuStatus.kitchen) {
                            $vm.menuStatus.open = !$vm.menuStatus.open;

                            // stops menu info disappearing before menu has closed fully
                            setTimeout(function(){
                                $vm.menuStatus.kitchen = !$vm.menuStatus.kitchen;
                            }, 500);

                        }else {
                            $vm.menuStatus.kitchen = !$vm.menuStatus.kitchen;
                        }

                        break;
                    case 'bedroom':

                        console.log('bedroom toggled');
                        // open menu if its not already open
                        if (!$vm.menuStatus.open) {
                            $vm.menuStatus.open = !$vm.menuStatus.open;

                        }

                        // reset all other menu status values
                        $vm.menuStatus.mobile = false;
                        $vm.menuStatus.livingroom = false;
                        $vm.menuStatus.bath = false;
                        $vm.menuStatus.kitchen = false;

                        // show living room menu information
                        if ($vm.menuStatus.bedroom) {

                            $vm.menuStatus.open = !$vm.menuStatus.open;

                            // stops menu info disappearing before menu has closed fully
                            setTimeout(function(){
                                $vm.menuStatus.bedroom = !$vm.menuStatus.bedroom;
                            }, 500)

                        }else {
                            $vm.menuStatus.bedroom = !$vm.menuStatus.bedroom;
                        }

                        break;
                    case 'bath':
                        console.log('bath toggled');
                        // open menu if its not already open
                        if (!$vm.menuStatus.open) {
                            $vm.menuStatus.open = !$vm.menuStatus.open;

                        }

                        // reset all other menu status values
                        $vm.menuStatus.mobile = false;
                        $vm.menuStatus.livingroom = false;
                        $vm.menuStatus.kitchen = false;
                        $vm.menuStatus.bedroom = false;

                        // show living room menu information
                        if ($vm.menuStatus.bath) {
                            // closes menu if link is pressed again
                            $vm.menuStatus.open = !$vm.menuStatus.open;

                            // stops menu info disappearing before menu has closed fully
                            setTimeout(function(){
                                $vm.menuStatus.bath = !$vm.menuStatus.bath;
                            }, 500)

                        }else {
                            $vm.menuStatus.bath = !$vm.menuStatus.bath;
                        }
                        break;
                    default:

                }
            },
            searchToggle: function(e) {
                this.searchStatus = !this.searchStatus;
            },
            basketToggle: function(e) {
                this.basketStatus = !this.basketStatus;
            },
            addToWishlist: function(e) {

                if (this.loggedInStatus && this.wishlist.status) {
                    let productInfo = JSON.parse($('#wishlist-heart')[0].attributes[1].nodeValue);
                    console.log($('#wishlist-heart'));

                    // create a new basketItem
                    productInfo.price = productInfo.price/100;

                    // create a new basketItem
                    let item = new BasketItem(productInfo.product, productInfo.id, productInfo.prod_name, productInfo.attributes.size, productInfo.attributes.color, productInfo.prod_slug, productInfo.prod_desc, productInfo.price, productInfo.image, this.prodQuantity, productInfo.attributes.category, productInfo.attributes.type);
                    //
                    console.log(item);

                    //check item wishlist exists in localStorage
                    let wishListStorage = (localStorage.getItem('idyl-wishlist'))?true:false;

                    if (!wishListStorage) {
                        console.log('WISHLIST localStorage DOESNT EXIST');
                        this.wishlist.items.splice(0, this.wishlist.items.length);

                    }else {
                        console.log('WISHLIST localStorage EXISTS ');
                        this.wishlist.items = JSON.parse(localStorage.getItem('idyl-wishlist'));
                    }

                    let exists = this.checkItemExists(this.wishlist.items, item),
                        $vm = this;
                    console.log(exists);
                    if (exists[0]) {
                        for (var i = 0; i < $vm.wishlist.items.length; i++) {
                            if ($vm.wishlist.items[i].id === item.id) {
                                $vm.wishlist.items.splice(i,1);

                                $.notify('item removed from wish list', 'error');

                                $('.wishlist-heart-icon').removeClass('fa-heart').addClass('fa-heart-o');

                                this.wishlist.totalItems -= 1;
                            }
                        }
                    }else {
                        $('.wishlist-heart-icon').removeClass('fa-heart-o').addClass('fa-heart');

                        this.wishlist.items.push(item);
                        this.wishlist.totalItems += 1;

                        $.notify('item added to wish list', 'success');
                    }
                }else {
                    $.notify('You have to be logged in to add items to your wishlist. create an account today', 'warn');
                }



            }

        }
    })

    $nav_vue.$watch('menuStatus.open', function(newVal, oldVal){
        if (newVal) {
            // open menu
            $('.menu-box').removeClass('menu-closed').addClass('menu-open');
        }else {
            $('.menu-box').removeClass('menu-open').addClass('menu-closed');
        }
    });

    $nav_vue.$watch('menuStatus.mobile', function(newVal, oldVal){
        if (newVal) {
            console.log('MENU IS OPENING');
           $('#b2').animate({
               opacity: 0
           }, 200);

           $('#b1').rotate({
               angle: 0,
               center: ["10%", "50%"],
               animateTo: 43.5
           });

           $('#b3').rotate({
               angle: 0,
               center: ["10%", "70%"],
               animateTo: -42
           });

       }else {
           $('#b2').animate({
                 opacity: 1
            }, 300);

           $('#b1').rotate({
              angle: 43.5,
              center: ["10%", "50%"],
              animateTo: 0
           });

           $('#b3').rotate({
              angle: -42,
              center: ["10%", "70%"],
              animateTo: 0
           });
           // close menu js
       }

    });

    // updates wishlist storage information for user
    $nav_vue.$watch('wishlist.items', function(newVal, oldVal) {
        console.log('wishlist array changed');

        // update user Vue with wishlist details

        // update database & store in local storage
        localStorage.setItem('idyl-wishlist', JSON.stringify(newVal));

        setTimeout(function(){
            console.log(JSON.parse(localStorage.getItem('idyl-wishlist')));
        }, 300);

    });

    if (window.location.pathname.split('/')[1] === 'myaccount') {
        let $user_vue = new Vue({
            el: '.user-vue',
            components: {},
            data: {
                // used for wishlist
                inBasket: false,
                status: 'connected',
                basketCount: 0,
                postcodeVerify: {
                    status: false,
                    code: ''
                },
                basket:{

                },
                wishlist:{

                }
            },
            methods: {
                // NOTE: VOID function. No longer adding to basket in wishlist
                addToBasket: function(e){
                    // $nav_vue.addToBasket(e);
                    console.log('ADD TO BASKET USER VUE');
                    console.log($(e.target));
                    let productInfo = JSON.parse($(e.target)[0].attributes[0].nodeValue);
                    console.log(productInfo);

                    // create a new basketItem
                    // let item = new BasketItem(productInfo.id, productInfo.stripe_id, productInfo.prod_name, productInfo.prod_tags, productInfo.prod_desc, productInfo.price, productInfo.prod_image, productInfo.quantity, productInfo.category);


                    // check if basket exist in local Storage
                    $nav_vue.checkBasketSession();
                    //
                    let exists = this.checkItemExists(productInfo);
                    console.log(exists);

                    if(!exists){
                        // update basket with new item
                        if (productInfo.quantity < 1) {
                            productInfo.quantity+=1;
                        }

                        $nav_vue.basketCount += 1;
                        $nav_vue.basket.items.push(productInfo);
                        $nav_vue.basketTotal += productInfo.price;

                        localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                        shakeShoppingIcon();
                    }

                },
                removeFromWishlist: function(e){
                    console.log($(e.target));
                    let productInfo = JSON.parse($(e.target)[0].attributes[0].nodeValue);
                    console.log(productInfo);

                    for (var i = 0; i < $nav_vue.wishlist.items.length; i++) {
                        if ($nav_vue.wishlist.items[i].id === productInfo.id) {
                            $nav_vue.wishlist.items.splice(i,1);

                            $.notify('item removed from wish list', 'error');

                            $nav_vue.wishlist.totalItems -= 1;
                        }
                    }

                },
                checkItemExists: function(itm){
                    console.log('clicked');
                    console.log(itm);
                    // this.item = itm;
                    let exists = $nav_vue.checkItemExists($nav_vue.basket.items, itm);

                    if (exists[0]) {
                        // this.inBasket = true;
                        return true;
                    }else {
                        // this.inBasket = false;
                        return false;

                    }
                },
                updateDetails: function(e){
                    let eventTrigger = $(e.target).parent(),
                        $userID = eventTrigger[0].attributes[1].nodeValue,
                        $userTitle = eventTrigger[0][0],
                        $userTitleVal = '',
                        $userFname = eventTrigger[0][1].value,
                        $userLname = eventTrigger[0][2].value,
                        $dob = eventTrigger[0][3].value,
                        $vm = this;

                    // get the selected option from list
                    for (var i = 0; i < $userTitle.length; i++) {
                        if ($userTitle[i].selected) {
                            $userTitleVal = $userTitle[i].value;
                        }
                    }

                    if (!$userFname || !$userLname || !$dob || $userTitleVal === 'default') {
                        $('.update-user-details').notify('One or more fields are empty. Please fill with relevant information', 'warn');
                        return;
                    }else {
                        let updatedDetails = new UpdateUserDetails($userID, $userTitleVal, $userFname, $userLname, $dob);

                        console.log(updatedDetails);

                        // send ajax to update user details
                        $.ajax({
                            url: '/scripts/settings.php',
                            type: 'post',
                            data:{
                                type:'user-details',
                                details: updatedDetails
                            },
                            success: function(data){
                                let $data = JSON.parse(data);
                                console.log($data);

                                switch ($data.status.code) {
                                    case (101 || '101'):

                                        $('#details-success').html($data.data.msg);

                                        setTimeout(function(){
                                            $('#details-success').html('');
                                        }, 3000);

                                        break;
                                    case (404 || '404'):

                                        $('#details-success').html($data.data.msg);

                                        setTimeout(function(){
                                            $('#details-success').html('');
                                        }, 3000);
                                        break;
                                    default:

                                }
                            },
                            error: function(){
                                console.log('error sending details to be updated. contact help');
                            }
                        })
                    }


                },
                updateLoginDetails: function(e){
                    let eventTrigger = $(e.target).parent(),
                        $userID = eventTrigger[0].attributes[1].nodeValue,
                        $email = eventTrigger[0][0].value,
                        $emailConfirm = eventTrigger[0][1].value,
                        $password = eventTrigger[0][2].value,
                        $passConfirm = eventTrigger[0][3].value,
                        $vm = this,
                        emailtrue = false,
                        passwordtrue = false;

                    // check to make sure fields are not empty
                    if (!$email || !$emailConfirm || !$password || !$passConfirm) {

                        $('#login-details-message').html('Login details cant be changed. One or more fields are empty');

                        setTimeout(function(){
                            $('#login-details-message').html('');
                        }, 4000);
                        return;
                    }

                    // check to make sure confirm fields match
                    if ($email !== $emailConfirm) {
                        // alert user
                        $('#email-check').html('Emails don\'t match. Please re-enter');

                        setTimeout(function(){
                            $('#email-check').html('');
                        }, 4000);

                    }else {
                        emailtrue = !emailtrue;
                    }

                    if ($password !== $passConfirm) {
                        $('#pass-check').html('Passwords don\'t match. Please re-enter');

                        setTimeout(function(){
                            $('#pass-check').html('');
                        }, 4000);
                    }else {
                        passwordtrue = !passwordtrue;
                    }

                    // send ajax to update user login details
                    if (emailtrue && passwordtrue) {
                        console.log('details are ready to be submitted via ajax');

                        let updatedLoginDetails = new UpdateLoginDetails($userID, $email, $emailConfirm, $password, $passConfirm);

                        $.ajax({
                            url: '/scripts/settings.php',
                            type: 'post',
                            data: {
                                type: 'login-details',
                                details: updatedLoginDetails
                            },
                            success: function(data){
                                let $data = JSON.parse(data);

                                switch ($data.status.code) {
                                    case (101 || '101'):
                                        $('#login-details-message').html($data.data.msg);

                                        // update current email dom element to reflect new email changes
                                        $('#user-email').html($data.data.email);

                                        // reset form

                                        // clear success message
                                        setTimeout(function(){
                                            $('#login-details-message').html('');
                                        }, 4000);

                                        break;
                                    case (404 || '404'):
                                        $('#login-details-message').html($data.data.msg);

                                        // clear error message
                                        setTimeout(function(){
                                            $('#login-details-message').html('');
                                        }, 4000);

                                        break;
                                    default:

                                }
                                console.log($data);
                            },
                            error: function(){

                            }
                        })
                    }

                },
                getBasketInfo: function() {
                    this.basketCount = $nav_vue.basketCount;
                    this.basket = $nav_vue.basket;
                },
                getWishlistInfo: function(){
                    this.wishlist = $nav_vue.wishlist;
                },
                phonenumber: function(inputtxt){
                    let phoneno = /^\d{11}$/;
                    if(inputtxt.match(phoneno)) {
                        return true;
                    }
                    else{
                        return false;
                    }
                },
                validatePostCode: function(postcode){
                    let $data = '',
                        $vm = this;

                },
                addAddress: function(e){
                    let eventTrigger = $(e.target).parent(),
                        $userTitle = eventTrigger[0][0],
                        $userTitleVal = '',
                        $userFname = eventTrigger[0][1].value,
                        $userLname = eventTrigger[0][2].value,
                        $phone_num = eventTrigger[0][3].value.replace(/ /g, ''),
                        $address1 = eventTrigger[0][4].value,
                        $address2 = eventTrigger[0][5].value,
                        $address3 = eventTrigger[0][6].value,
                        $city_town = eventTrigger[0][7].value,
                        $post_code = eventTrigger[0][8].value.replace(/ /g, ''),
                        $country = eventTrigger[0][9].value,
                        $country_name = ''
                        $vm = this;

                    // get the selected option from list
                    // NOTE: turn into a function
                    for (var i = 0; i < $userTitle.length; i++) {
                        if ($userTitle[i].selected) {
                            $userTitleVal = $userTitle[i].value;
                        }
                    }
                    for (var k = 0; k < $country.length; k++) {
                        if ($country[k].selected) {
                            $country_name = $country[k].value;
                        }
                    }


                    //validate phone number
                    let phone_real = this.phonenumber($phone_num);

                    // add default value to address 2 & 3 if they havent been entered;
                    $address2 = (!$address2)?'false':$address2;
                    $address3 = (!$address3)?'false':$address3;


                    /*
                        NOTE: postcodes.io API
                    */
                    // verifying the user entered post code with postcodes.io
                    $.ajax({
                        url: `https://api.postcodes.io/postcodes/${$post_code}/validate`,
                        type: 'get',
                        success:function(data){
                            let validateSuccess = new Promise(function(resolve, reject) {
                                if (data.status === 200) {
                                    resolve(data.result);
                                }else {
                                    reject(false);
                                }
                            });

                            validateSuccess.then(function(val){
                                // if ($data.result) {
                                console.log(val);
                                if (!$userFname || !$userLname || !$phone_num || !$address1 || !$city_town || !$post_code || $userTitleVal === 'default' || !phone_real || !val) {

                                    $.notify('Required fields haven\'t been filled in', 'error');

                                    if (!val) {
                                        $('#postcode-input').css({'border':'2px solid red'});
                                        $('#postcode-input-mesage').html('please enter a valid postcode');
                                        $('#postcode-input-message').css({'color':'red'});

                                        setTimeout(function(){
                                            $('#postcode-input-mesage').html('');
                                        }, 5000);
                                    }

                                    if (!phone_real) {
                                        console.log('PHONE NOT REAL');
                                        $('#phone-input-address').css({'border':'2px solid red'});
                                        $('#phone-input-message').html('Please enter a valid phone number')
                                        $('#phone-input-message').css({'color':'red'});

                                        setTimeout(function(){
                                            $('#phone-input-message').html('');
                                        }, 5000);
                                    }

                                    return;
                                }
                                else {
                                    // create a class that represents address being added
                                    let address = new Address($userTitleVal, $userFname, $userLname, $phone_num, $address1, $address2, $address3, $city_town, $post_code, $country);

                                    console.log(address);

                                    $.ajax({
                                        type: 'post',
                                        url: '/scripts/settings.php',
                                        data: {
                                            type: 'add-address',
                                            address: address
                                        },
                                        success: function(data) {
                                            console.log(JSON.parse(data));
                                            let $data = JSON.parse(data);

                                            // handle success & errors
                                            //success
                                            switch ($data.status.code) {
                                                case (101 || '101'):
                                                    window.location = '/myaccount/addressbook';

                                                    break;
                                                case (404 || '404'):
                                                    console.log('ADDRESS SAVE ERROR');
                                                    console.log($data.data.msg);

                                                    break;
                                                default:

                                            }

                                        },
                                        error: function() {
                                            console.log('error with create account ajax');
                                        }
                                    })
                                }

                            }).catch((reason)=>{
                                console.log(reason);
                            });


                        },
                        error: function(){
                            console.log('error validating postcode');
                        }
                    })

                },
                editaddressDirect: function(e){
                    let eventTrigger = $(e.target),
                        targetpage = eventTrigger[0].href,
                        posID = eventTrigger.parent().attr('data-index');

                    // set cookie of address pos in array
                    Cookies.set('idyl-address-pos', posID);
                    console.log(targetpage);
                    console.log(posID);

                    setTimeout(function(){
                        window.location = targetpage;
                    }, 200);
                },
                editAddress: function(e){
                    let eventTrigger = $(e.target).parent(),
                        addressPositionID = parseInt($(e.target)[0].attributes[1].nodeValue),
                        $userTitle = eventTrigger[0][0],
                        $userTitleVal = '',
                        $userFname = eventTrigger[0][1].value,
                        $userLname = eventTrigger[0][2].value,
                        $phone_num = eventTrigger[0][3].value.replace(/ /g, ''),
                        $address1 = eventTrigger[0][4].value,
                        $address2 = eventTrigger[0][5].value,
                        $address3 = eventTrigger[0][6].value,
                        $city_town = eventTrigger[0][7].value,
                        $post_code = eventTrigger[0][8].value.replace(/ /g, ''),
                        $country = eventTrigger[0][9].value,
                        $country_name = ''
                        $vm = this;

                    console.log(addressPositionID);
                    // get the selected option from list
                    // NOTE: turn into a function
                    for (var i = 0; i < $userTitle.length; i++) {
                        if ($userTitle[i].selected) {
                            $userTitleVal = $userTitle[i].value;
                        }
                    }
                    for (var k = 0; k < $country.length; k++) {
                        if ($country[k].selected) {
                            $country_name = $country[k].value;
                        }
                    }


                    //validate phone number
                    let phone_real = this.phonenumber($phone_num);

                    // add default value to address 2 & 3 if they havent been entered;
                    $address2 = (!$address2)?'false':$address2;
                    $address3 = (!$address3)?'false':$address3;

                    /*
                        NOTE: postcodes.io API
                    */
                    // verifying the user entered post code with postcodes.io
                    $.ajax({
                        url: `https://api.postcodes.io/postcodes/${$post_code}/validate`,
                        type: 'get',
                        success:function(data){
                            let validateSuccess = new Promise(function(resolve, reject) {
                                if (data.status === 200) {
                                    resolve(data.result);
                                }else {
                                    reject(false);
                                }
                            });

                            validateSuccess.then(function(val){
                                // if ($data.result) {
                                console.log(val);
                                if (!$userFname || !$userLname || !$phone_num || !$address1 || !$city_town || !$post_code || $userTitleVal === 'default' || !phone_real || !val) {

                                    $.notify('Required fields haven\'t been filled in', 'error');

                                    if (!val) {
                                        $('#postcode-input').css({'border':'2px solid red'});
                                        $('#postcode-input-mesage').html('please enter a valid postcode');
                                        $('#postcode-input-message').css({'color':'red'});

                                        setTimeout(function(){
                                            $('#postcode-input-mesage').html('');
                                        }, 5000);
                                    }

                                    if (!phone_real) {
                                        console.log('PHONE NOT REAL');
                                        $('#phone-input-address').css({'border':'2px solid red'});
                                        $('#phone-input-message').html('Please enter a valid phone number')
                                        $('#phone-input-message').css({'color':'red'});

                                        setTimeout(function(){
                                            $('#phone-input-message').html('');
                                        }, 5000);
                                    }

                                    return;
                                }
                                else {
                                    // create a class that represents address being added
                                    let address = new Address($userTitleVal, $userFname, $userLname, $phone_num, $address1, $address2, $address3, $city_town, $post_code, $country);

                                    console.log(address);

                                    $.ajax({
                                        type: 'post',
                                        url: '/scripts/settings.php',
                                        data: {
                                            type: 'edit-address',
                                            address: address,
                                            position: addressPositionID
                                        },
                                        success: function(data) {
                                            console.log(JSON.parse(data));
                                            let $data = JSON.parse(data);

                                            // handle success & errors
                                            //success
                                            switch ($data.status.code) {
                                                case (101 || '101'):
                                                    window.location = '/myaccount/addressbook';

                                                    break;
                                                case (404 || '404'):
                                                    console.log('ADDRESS EDIT ERROR');
                                                    console.log($data.data.msg);

                                                    break;
                                                default:

                                            }

                                        },
                                        error: function() {
                                            console.log('error with EDIT ADDRESS ajax');
                                        }
                                    })
                                }

                            }).catch((reason)=>{
                                console.log(reason);
                            });


                        },
                        error: function(){
                            console.log('error validating postcode');
                        }
                    })
                },
                deleteAddress: function(e){
                    let eventTrigger = $(e.target),
                        addressPositionID = eventTrigger.parent().attr('data-index');

                    $.ajax({
                        url: '/scripts/settings.php',
                        type: 'post',
                        data: {
                            type: 'delete-address',
                            position: addressPositionID
                        },
                        success: function(data){
                            let $data = JSON.parse(data);

                            switch ($data.status.code) {
                                case (101 || '101'):
                                    console.log($data);
                                    window.location = '/myaccount/addressbook';
                                    break;
                                case (404 || '404'):
                                    console.log($data);
                                    break;
                                default:

                            }
                        },
                        error: function(){

                        }
                    })
                }
            },
            watch: {

            },
            mounted: function() {
                console.log('user vue is working');
                this.getBasketInfo();
                this.getWishlistInfo();

            }
        });

        $user_vue.$watch('basket.items', function(newVal, oldVal) {
            $user_vue.basketCount = newVal.length;
        });

    }

    console.log(window.location.pathname);
    if (window.location.pathname.split('/')[1] !== 'myaccount') {
        console.log('home visible');
        let basketItem2 = {
            data: function(){
                return{
                    status: 'component works'
                }
            },
            props: ['itemid', 'itemname', 'productimage', 'quantity', 'price', 'accprice', 'index', 'stripeid'],
            template: `<div class="card basket-card" :id="'basket-checkout-item-'+index">
                <div class="card-body"> <div class="row"> <div class="col-12 basket-card-body d-flex flex-wrap flex-row"> <div class="p-2 d-flex flex-row justify-content-center align-items-center image-checkout-col"> <img :src="productimage" :alt="itemname"> </div> <div class="p-2"> <div class="info-checkout-container"> <h5 class="card-title">{{itemname}}</h5> </div> <div class="info-checkout-container"> <p class="card-subtitle mb-2">£{{price.toFixed(2)}}</p> </div> <div class="info-checkout-container"> <p class="card-subtitle mb-2 text-muted"> <span><strong>Size:</strong>N/A</span>&nbsp; <span><strong>Qty:</strong>{{quantity}}</span> </p> </div> <div class="info-checkout-container"> <hr class="d-lg-none"> <p class="card-subtitle mb-2"><strong>Total: £{{accprice.toFixed(2)}}</strong> </p> </div> </div> <div class="p-2 d-flex flex-row justify-content-center align-items-center" v-bind:data-position-id="index" v-bind:data-element-id="'basket-checkout-item-'+index"> <span class="fa fa-trash-o mb-2" v-bind:id="itemid" v-on:click="removeItem"></span> </div> </div> </div> <hr> </div>
                </div>`,
            methods: {
                removeItem: function(e){
                    // getting the correct items details from the basket array
                    let itemID = parseInt($(e.target).parent().attr('data-position-id'))
                        itemrowID = '#' + $(e.target).parent().attr('data-element-id'),
                        selectedItem = $nav_vue.basket.items[itemID];


                    if (selectedItem.quantity > 1) {

                        selectedItem.quantity -= 1;
                        selectedItem.total_price -= selectedItem.price;
                        $nav_vue.basketTotal -= selectedItem.price;

                        localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                    } else {

                        if ($nav_vue.basketCount === 1) {
                            $nav_vue.emptyBasket();
                            $home_vue.basketHasItems = false;
                            return;
                        }
                        $nav_vue.basketCount -= 1;
                        $nav_vue.basketTotal -= selectedItem.total_price;

                        console.log(itemrowID);
                        console.log(itemID);

                        $(itemrowID).fadeOut().remove();

                        // delete from array
                        console.log($nav_vue.basket.items);
                        $nav_vue.basket.items.splice(itemID, 1);
                        console.log($nav_vue.basket.items);

                        localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));
                    }
                }
            }
        };

        let $home_vue = new Vue({
            el: '.home',
            components:{
                'basket-item-checkout': basketItem2
            },
            data: {
                slidesActive: true,
                selectedProduct: false,
                prodQuantity: 1,
                product: '',
                featuredProducts: [],
                createUserSuccess: '',
                basketHasItems: false,
                filterStatus: false,
                basket:{

                },
                slides: [{
                        id: 1,
                        image: '/assets/main/davide-cantelli-240809.jpg'
                    },
                    {
                        id: 2,
                        image: '/assets/main/breather-196135.jpg'
                    },
                    {
                        id: 3,
                        image: '/assets/main/mitch-moondae-321409.jpg'
                    }
                ],
                categories: [{
                        name: 'living room',
                        image: '/assets/category/christelle-bourgeois-97314.jpg',
                        categoryLink: '#'
                    },
                    {
                        name: 'kitchen',
                        image: '/assets/category/alison-marras-361007.jpg',
                        categoryLink: '#'
                    },
                    {
                        name: 'bedroom',
                        image: '/assets/category/krista-mcphee-445060.jpg',
                        categoryLink: '#'
                    },
                    {
                        name: 'bath',
                        image: '/assets/category/david-cohen-127022.jpg',
                        categoryLink: '#'
                    }
                ],
                blogStories: [{
                        id: 'BP0001',
                        status: 'LIVE',
                        image_address: '/assets/main/Blog-intro.jpg',
                        category: 'all',
                        title: 'My First Blog Post',
                        brief_desc: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                        content: `<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>`,
                        created: '20/12/17',
                        modified: '20/12/17',
                        published: '20/12/17',
                        date: {
                            month: 'December',
                            day: 'Monday',
                            time: '22:03:16',
                            full: '20/12/17 22:03:16'
                        }

                    },
                    {
                        id: 'BP0002',
                        status: 'LIVE',
                        image_address: '/assets/main/Blog-intro.jpg',
                        category: 'all',
                        title: 'My Second Blog Post',
                        brief_desc: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                        content: `<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>`,
                        created: '20/12/17',
                        modified: '20/12/17',
                        published: '20/12/17',
                        date: {
                            month: 'December',
                            day: 'Monday',
                            time: '22:13:16',
                            full: '20/12/17 22:03:16'
                        }

                    },
                    {
                        id: 'BP0003',
                        status: 'LIVE',
                        image_address: '/assets/main/Blog-intro.jpg',
                        category: 'all',
                        title: 'My Third Blog Post',
                        brief_desc: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                        content: `<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>`,
                        created: '20/12/17',
                        modified: '20/12/17',
                        published: '20/12/17',
                        date: {
                            month: 'December',
                            day: 'Monday',
                            time: '22:23:16',
                            full: '20/12/17 22:03:16'
                        }

                    }
                ]
            },
            methods: {
                toggleFilter: function(e){
                    // console.log('filter toggled');
                    this.filterStatus = !this.filterStatus;
                },
                dummyAdd: function() {
                    let randomData = {
                        cookieid: 'xbdgwt538196vd',
                        email: 'random@gmail.com',
                        customerid: '18'
                    };

                    $.ajax({
                        url: '/scripts/dummyadd.php',
                        type: 'post',
                        data: {
                            cookieinfo: randomData
                        },
                        success: function(data) {

                        },
                        error: function() {

                        }
                    })
                },
                addToWishlist: function() {
                    $nav_vue.addToWishlist();
                },
                payment: function(e) {
                    // get the total of the basket
                    let basketTotal = parseInt($nav_vue.basketTotal) * 100;

                    // send over customer email and other info here

                    // console.log(basketTotal * 100);
                    handler.open({
                        name: 'idyl',
                        description: 'Multiple Purchases',
                        amount: basketTotal,
                        currency: 'gbp',
                        zipCode: true,
                        billingAddress: true,
                        shippingAddress: true

                    });
                },
                addtoQuant: function() {
                    this.prodQuantity += 1;
                },
                minustoQuant: function() {
                    if (this.prodQuantity === 1) {
                        console.log('quantity cant be less than 0');
                        return;
                    } else {
                        this.prodQuantity -= 1;
                    }
                },
                getFeaturedProducts: function() {
                    // currently function will get only living toom products

                    // NOTE query should join all product tables and return the top 6
                    let $vm = this;
                    $.ajax({
                        type: 'post',
                        url: '/scripts/get_products.php',
                        data: {
                            all: true
                        },
                        success: function(data) {
                            let $data = JSON.parse(data);

                            console.log($data);

                            for (var i = 0; i < $data.product.length; i++) {
                                // $data.product[i].product_image = JSON.parse($data.product[i].product_image);

                                $vm.featuredProducts.push($data.product[i]);
                            }
                            // console.log('-----');
                            // console.log($vm.featuredProducts);
                        },
                        error: function() {
                            console.log('log error with ajax ');
                        }
                    })
                },
                updateSelected: function(e) {
                    console.log("selected product ID - OLD: " + this.selectedProduct);
                    this.selectedProduct = $(e.target)[0].attributes[1].nodeValue;

                    console.log("selected product ID: " + this.selectedProduct);
                    // window.location = '/product?cat=livingroom&id=1';
                },
                ajaxFunctions: function(e) {
                    /*

                    */
                    console.log('ajax func executed');

                    if (!this.selectedProduct) {
                        console.log("selected product ID - FALSE: " + this.selectedProduct);
                        return;
                    }

                    console.log("selected product ID - BEFORE AJAX RUNS: " + this.selectedProduct);
                    $.ajax({
                        type: 'post',
                        url: '/scripts/get_products.php',
                        data: {
                            id: parseInt(this.selectedProduct)
                        },
                        success: function(data) {
                            let $data = JSON.parse(data);
                            console.log($data);
                        },
                        error: function() {
                            console.log('log error with ajax ');
                        }
                    })
                },
                capitalizeFirstLetter: function(string) {
                    let splitStr = string.split(' ');
                    if (splitStr.length > 1) {
                        for (var i = 0; i < splitStr.length; i++) {
                            splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].slice(1);
                        }
                        return splitStr.join(' ');
                    } else {
                        return string.charAt(0).toUpperCase() + string.slice(1);
                    }

                },
                checkItemExists: function(bsktItms, newItem) {
                    for (var i = 0; i < bsktItms.length; i++) {
                        if (newItem.stripesku_id === bsktItms[i].stripesku_id) {
                            return [true, bsktItms[i], i];
                        }
                    }

                    return [false];
                },
                getBasketInfo: function() {
                    this.basket = $nav_vue.basket;
                    if (this.basket.items.length < 1) {
                        this.basketHasItems = false;
                        $('.basket-home').addClass('empty-basket');
                    }else {
                        this.basketHasItems = true;
                        $('.basket-home').removeClass('empty-basket');
                    }
                },
                addToBasket: function(e) {
                    console.log('item added successfully');
                    /*
                        1. check if the item is already in the basket
                            - if(true): * add to quantity +1 per click
                                        * add to price + prdct price
                            - else: add item to basket as new row
                    */

                    // CLASS BASKET ITEM args:
                    // id, prod_name, prod_desc, price, prod_image, quantity, category
                    let productInfo = JSON.parse($(e.target)[0].attributes[0].nodeValue);
                    console.log(productInfo);

                    productInfo.price = productInfo.price/100;

                    // create a new basketItem
                    let item = new BasketItem(productInfo.product, productInfo.id, productInfo.prod_name, productInfo.attributes.size, productInfo.attributes.color, productInfo.prod_slug, productInfo.prod_desc, productInfo.price, productInfo.image, this.prodQuantity, productInfo.attributes.category, productInfo.attributes.type);

                    console.log(item);
                    //
                    // // check if basket exist in local Storage
                    $nav_vue.checkBasketSession();

                    let exists = this.checkItemExists($nav_vue.basket.items, item);
                    console.log(exists);

                    if (exists[0]) {
                        console.log('item exists in basket');
                        // update quantity and price for exsisting item
                        console.log(item.quantity);
                        let itemPos = exists[2];

                        $nav_vue.basket.items[itemPos].quantity += item.quantity;

                        // re-calculate total
                        $nav_vue.basket.items[itemPos].total_price += ($nav_vue.basket.items[itemPos].price * item.quantity);

                        console.log($nav_vue.basket.items[itemPos].total_price);

                        $nav_vue.basketTotal += (item.price * item.quantity);

                        // $.notify('items quanitity updated', 'success');

                        localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                        shakeShoppingIcon();
                    }
                    else {
                        // update basket with new item
                        $nav_vue.basketCount += 1;
                        $nav_vue.basket.items.push(item);
                        $nav_vue.basketTotal += (item.price * item.quantity);

                        localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                        shakeShoppingIcon();
                    }


                },
                getSlideData: function() {

                },
                createUser: function(e) {
                    console.log('user created');
                    let eventTrigger = $(e.target).parent(),
                        $userTitle = eventTrigger[0][0],
                        $userTitleVal = '',
                        $userFname = eventTrigger[0][1].value,
                        $userLname = eventTrigger[0][2].value,
                        $dob = eventTrigger[0][3].value,
                        $email = eventTrigger[0][4].value,
                        $emailConfirm = eventTrigger[0][5].value,
                        $password = eventTrigger[0][6].value,
                        $passConfirm = eventTrigger[0][7].value,
                        $vm = this;

                    // get the selected option from list
                    for (var i = 0; i < $userTitle.length; i++) {
                        if ($userTitle[i].selected) {
                            $userTitleVal = $userTitle[i].value;
                        }
                    }

                    if (!$userFname || !$userLname || !$email || !$password || $userTitleVal === 'default') {
                        $.notify('Fields or Title hasn\'t been selected', 'warn');
                        return;
                    } else {
                        // $.notify('all fields filled in successfully', 'success');
                        // console.log([$userTitleVal, $userFname, $userLname, $email, $password]);
                        let user = new User($userTitleVal, $userFname, $userLname, $dob, $email, $password);

                        console.log(user);

                        $.ajax({
                            type: 'post',
                            url: '/scripts/createaccount.php',
                            data: {
                                type: 'create',
                                user: user
                            },
                            success: function(data) {
                                console.log(JSON.parse(data));
                                let $data = JSON.parse(data);


                                // handle success & errors
                                //success
                                if ($data.status.code === 101) {
                                    $.notify($data.data.msg, 'success');

                                    $vm.createUserSuccess = 'You\'ll be redirected to login page shortly';

                                    setTimeout(function() {
                                        console.log('redirect user to login');
                                        window.location = '/login';
                                        return;
                                    }, 2000);

                                }

                                // error
                                if ($data.status.code === 404) {

                                }

                            },
                            error: function() {
                                console.log('error with create account ajax');
                            }
                        })
                    }


                },
                login: function(e) {
                    console.log('user logged in');
                    let eventTrigger = $(e.target).parent(),
                        $email = eventTrigger[0][0].value,
                        $password = eventTrigger[0][1].value,
                        $staySignedIn = eventTrigger[0][2].checked;

                    // console.log([$email, $password, $staySignedIn]);

                    if (!$email || !$password) {
                        $.notify('Please fill in required fields', 'warn');
                    } else {
                        let loginUser = new LoginUser($email, $password, $staySignedIn);

                        console.log(loginUser);

                        // ajax to send details to server for processing

                        $.ajax({
                            type: 'post',
                            url: '/scripts/loginuser.php',
                            data: {
                                type: 'login',
                                user: loginUser
                            },
                            success: function(data) {
                                let $data = JSON.parse(data);

                                console.log($data);
                                switch ($data.status.code) {
                                    case (101 || '101'):
                                        // success
                                        $nav_vue.loggedInStatus = !$nav_vue.loggedInStatus;

                                        $nav_vue.activatewishlist();
                                        // reditect user to home page or previous page they were on
                                        setTimeout(function() {
                                            if (window.location.pathname === '/login') {
                                                window.location = '/myaccount/home';
                                            }
                                        }, 500);

                                        break;
                                    case (404 || '404'):
                                        // error
                                        $.notify($data.data.msg, 'error');
                                        break;
                                    default:

                                }
                                // console.log(JSON.parse($data.user.details));
                            },
                            error: function() {
                                console.log('error logging in user. check ajax function');
                            }
                        })
                    }
                },
                checkIfExists: function(e) {
                    let eventTrigger = $(e.target).parent(),
                        $userEmail = eventTrigger[0][0].value;

                    if (!$userEmail) {
                        $('#error-message-email').html('Please Enter an email');

                        setTimeout(function() {
                            // reset error message field
                            $('#error-message-email').html('');
                        }, 3000);

                        return;
                    }

                    $.ajax({
                        type: 'post',
                        url: '/scripts/createaccount.php',
                        data: {
                            type: 'check',
                            email: $userEmail
                        },
                        success: function(data) {
                            let $data = JSON.parse(data);
                            console.log($data);

                            switch ($data.status.code) {
                                case (101 || '101'):
                                    // redirect user to createAccount page
                                    window.location = "/createaccount/new";

                                    break;
                                case (404 || '404'):
                                    // error
                                    $('#error-message-email').html($data.data.msg);
                                    console.log($data.data.msg);

                                    setTimeout(function() {
                                        // reset error message field
                                        $('#error-message-email').html('');
                                    }, 3000);

                                    break;
                                default:

                            }
                        },
                        error: function() {
                            console.log('error with create account ajax');
                        }
                    })
                }
            },
            computed: {

            },
            watch: {
                filterStatus: function(value){
                    if (value) {
                        if ($('.filter-mobile').hasClass('closed-filter')) {
                            $('.filter-mobile').removeClass('closed-filter').addClass('open-filter');
                        }

                    }else {
                        if ($('.filter-mobile').hasClass('open-filter')) {
                            $('.filter-mobile').removeClass('open-filter').addClass('closed-filter');
                        }
                    }
                },
                prodQuantity: function(value) {
                    $('#quantity-count').html(value);
                },
                createUserSuccess: function(value) {
                    $('#signup-message').html(value);
                }
            },
            created: function() {

            },
            mounted: function() {
                // intialize the slick slideshow
                $('.home-slide').slick({
                    lazyLoad: 'ondemand',
                    autoplay: true,
                    autoplaySpeed: 3000,
                    arrows: false,
                    appendDots: $('.home-slide'),
                    dots: true
                })

                $('.pr-info-link').on('click', function(e) {
                    console.log($(e.target));
                    let targetElement = $(e.target)[0];
                    if (targetElement.tagName === 'SPAN') {
                        console.log('span clicked');
                        if ($(targetElement).hasClass('closed-accordion')) {

                            // remove open-accordion from recent opened accordion e.g close it
                            let recent = $('.pr-info-link').children();
                            for (var i = 0; i < recent.length; i++) {
                                if ($(recent[i]).hasClass('open-accordion')) {
                                    $(recent[i]).removeClass('fa-minus open-accordion').addClass('fa-plus closed-accordion');
                                }
                            }

                            // open current clicked accordion
                            $(targetElement).removeClass('fa-plus closed-accordion').addClass('fa-minus open-accordion');

                        } else {
                            console.log('clicked same');
                            $(targetElement).removeClass('fa-minus open-accordion').addClass('fa-plus closed-accordion');
                        }
                    }


                })

                this.getFeaturedProducts();
                this.getBasketInfo();

                // this.ajaxFunctions();
            },

        })
    } else {
        console.log('home hidden');
    }




    // plain html template js that updates vue instances
    $('#footer-search').on('click', function() {
        console.log('footer search clicked');
        $nav_vue.searchToggle();
    })

})
