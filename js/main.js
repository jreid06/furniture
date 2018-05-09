(function() {
    'use strict';
    // this function is strict...
}());


$(document).ready(function() {

    $('#test-btn').on('click', function() {

        $.ajax({
            url: '/scripts/testscript.php',
            type: 'post',
            data: {
                order: 'or_1Bz1CvL06dWivKUTHhNXzn1G',
                email: 'info@jbreid.co.uk'
            },
            success: function(data) {
                // let $data = JSON.parse(data);

                // console.log($data);
                console.log(data);
            }
        })
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
        template: `<div class="slideshow-div justify-content-center align-items-center lazy" v-bind:style="{background: 'url(' + image + ')'}">

            <h1>{{title.toUpperCase()}}</h1>
            <h4>{{content.toUpperCase()}}</h4>
            <a class="btn btn-primary" :href="btnlink">{{btntext}}</a> </div>`,
        props: ['image', 'title', 'content', 'btntext', 'btnlink']
    });

    Vue.component('category', {
        data: function() {
            return {
                status: 'component works'
            }
        },
        template: `<div class="col-6 col-md-3 col-lg-3 cat-home-box">
            <a v-bind:href="categorylink">
            <div class="card category-card" v-bind:id="'cat-'+num">
            <div class="card-img-bgrnd d-flex justify-content-center align-items-center lazy" v-bind:style="{background: 'url(' + image + ')'}">
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

                    // update database with latest basket info
                    if ($nav_vue.loggedInStatus) {
                        $nav_vue.updateBasketDB($nav_vue.basket.items);
                    }


                } else {

                    if ($nav_vue.basketCount === 1) {
                        $nav_vue.emptyBasket();

                        // update database with latest basket info
                        if ($nav_vue.loggedInStatus) {
                            $nav_vue.updateBasketDB($nav_vue.basket.items);
                        }

                        return;
                    }
                    $nav_vue.basketCount -= 1;
                    $nav_vue.basketTotal -= selectedItem.total_price;

                    // console.log(itemrowID);
                    // console.log(itemID);

                    $(itemrowID).fadeOut().remove();

                    // delete from array
                    // console.log($nav_vue.basket.items);
                    $nav_vue.basket.items.splice(itemID, 1);
                    // console.log($nav_vue.basket.items);

                    localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                    // update database with latest basket info
                    if ($nav_vue.loggedInStatus) {
                        $nav_vue.updateBasketDB($nav_vue.basket.items);
                    }

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
                <!--<div class="card-img-bgrnd" :style="{background: 'url(' + productimage + ')'}"></div>-->
                <div class="product-image">
                    <img class="card-img-top" :src="productimage" alt="image of product">
                </div>
                  <div class="card-body">
                    <h6 class="card-subtitle mb-2"><a :href="'/product/'+productcat+'/'+productcattype+'/'+productnameslug+'-'+productcolorslug+'-'+productsizeslug+'/'+productid+'/'+productskuid">{{producttitle}} - {{capitalizeFirstLetter(productcolorslug)}} - {{capitalizeFirstLetter(productsizeslug)}}</a></h6>
                    <p class="card-text">£{{(productprice/100).toFixed(2)}}</p>
                  </div>
                </div>
            </div>`,
        props: ['productid', 'productskuid', 'productimage', 'producttitle', 'productprice', 'indexkey', 'productcattype', 'productcat', 'productnameslug', 'productcolorslug', 'productsizeslug'],
        methods: {
            gotoProduct: function(e) {
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

    let $subscribe_vue = new Vue({
        el: '.subscribe-vue',
        data: {
            subscribe: true
        },
        methods: {
            toggleSubscribeBar: function(e) {
                let targetElement = $(e.target)[0],
                    action = targetElement.attributes['data-action'].value;

                console.log(targetElement);
                console.log(action);

                if (action === 'down') {
                    $('.email-subscribe-bar').css({
                        'height': '35px'
                    });
                    $('#subscribeShow').removeClass('d-none');
                } else {
                    $('.email-subscribe-bar').css({
                        'height': '60px'
                    });
                    $('#subscribeShow').addClass('d-none');
                }
            },
            subscribeUser: function() {
                let $email = $('.subscription-email')[0].value;
                console.log($email);

                $.ajax({
                    url: '/scripts/subscribeuser.php',
                    type: 'post',
                    data: {
                        type: 'subscribe',
                        emailsub: $email
                    },
                    success: function(data) {
                        let $data = JSON.parse(data);

                        console.log($data);
                        switch ($data.status.code) {
                            case (101 || '101'):
                                $('.email-subscribe-bar').notify($data.data.msg, {
                                    position: "top center",
                                    className: "success"
                                });
                                break;
                            case (404 || 404):
                                $('.email-subscribe-bar').notify($data.data.msg, {
                                    position: "top center",
                                    className: $data.status.code_status
                                });
                                break;
                            default:

                        }
                    },
                    error: function() {
                        $('.email-subscribe-bar').notify('error submitting email. Contact help', {
                            position: "top center",
                            className: 'error'
                        });
                    }
                })
            }
        }
    })

    let $nav_vue = new Vue({
        el: '.nav-vue',
        components: {
            'basket-item': basketItem
        },
        data: {
            window: window,
            menuStatus: {
                selected: false,
                selected_nav:{
                    links: [],
                    cta_boxes: []
                },
                navloaded: false,
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
            navHeader: '',
            loggedInStatus: false,
            loggedInUser: {
                id: ''
            },
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
                        name: 'all products',
                        slug: '',
                        cat: 'livingroom'
                    },
                    {
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
                        name: 'Livingroom lamps',
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
                kitchen: [{
                        name: 'all products',
                        slug: '',
                        cat: 'kitchen'
                    },
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
                bedroom: [{
                        name: 'all products',
                        slug: '',
                        cat: 'bedroom'
                    },
                    {
                        name: 'bed linen',
                        slug: 'linen',
                        cat: 'bedroom',
                        image: ''
                    },
                    {
                        name: 'Bedroom cushions',
                        slug: 'cushions',
                        cat: 'bedroom',
                        image: ''
                    },
                    {
                        name: 'Bedroom lamps',
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
                bath: [{
                        name: 'all products',
                        slug: '',
                        cat: 'bath'
                    },
                    {
                        name: 'towel',
                        slug: 'towel',
                        cat: 'bath',
                        image: ''
                    },
                    {
                        name: 'shower curtains',
                        slug: 'curtains',
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
            },
            searchListing:{
                categories:[]
            }
        },
        methods: {
            getNavdata: function(){
                let $vm = this;

                $.ajax({
                    url: '/scripts/get_nav_data.php',
                    type: 'post',
                    data: {
                        nav: true
                    },
                    success: function(data){
                        let $data = JSON.parse(data);

                        console.log('--------');
                        console.log('--------');
                        console.log('');

                        console.log($data);

                        console.log('');
                        console.log('--------');
                        console.log('--------');

                        // format and structure data
                        let sublink_navs = $data.info.link_types.submenu_navs;
                            single_navs = $data.info.link_types.singlem_navs;
                            navHeader_data = [],
                            navSubcat_data = '';

                        for (var i = 0; i < sublink_navs.length; i++) {
                            let navlink_data = {
                                address: '',
                                title: '',
                                slug: '',
                                sublinks: ''
                            };

                            navlink_data.address = '#';
                            navlink_data.title = sublink_navs[i].nav_title;
                            navlink_data.slug = sublink_navs[i].nav_json_data.slug;
                            navlink_data.sublinks = sublink_navs[i].nav_json_data.submenu;

                            navHeader_data.push(navlink_data);

                            // update products array with all categories and their sub-categories

                            // add category to products array

                            $vm.products[sublink_navs[i].nav_json_data.slug] = [];

                            for (var j = 0; j < sublink_navs[i].nav_json_data.submenu_categories.length; j++) {
                                sublink_navs[i].nav_json_data.submenu_categories[j].cat = sublink_navs[i].nav_title;
                                $vm.products[sublink_navs[i].nav_json_data.slug].push(sublink_navs[i].nav_json_data.submenu_categories[j]);
                            }

                            $vm.products[sublink_navs[i].nav_json_data.slug].push(sublink_navs[i].nav_json_data.cta_boxes);
                        }

                        for (var k = 0; k < single_navs.length; k++) {
                            let navlink_data = {
                                address: '',
                                title: '',
                                slug: '',
                                sublinks: ''
                            };

                            navlink_data.address = single_navs[k].nav_json_data.address;
                            navlink_data.title = single_navs[k].nav_title;
                            navlink_data.slug = single_navs[k].nav_json_data.slug;
                            navlink_data.sublinks = single_navs[k].nav_json_data.submenu;

                            navHeader_data.push(navlink_data);
                        }

                        // update nav header array with nav link objects
                        $vm.navHeader = navHeader_data;

                        // updated navloaded status
                        $vm.menuStatus.navloaded = true;

                    }
                })
            },
            searchFilter: function(e) {

                // fade in search results container
                $('.search-listings').fadeIn();

                let input = $(e.target)[0],
                    filter = input.value.toLowerCase(),
                    ul = $('.search-listing-values')[0];
                    li = ul.children;

                // console.log(input.value);
                // console.log(ul);

                for (i = 0; i < li.length; i++) {
                    a = li[i].children[0];
                    if (a.innerHTML.toLowerCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            },
            goHome: function() {
                window.location = '/';
            },
            toggleAccountMenu: function() {
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
            retrieveWishlist: function() {
                let testData = '';


                // return 'hello async';
            },
            initializeWishlist: function() {
                // check if wishlist items exist in DB
                let $vm = this;
                $.ajax({
                    url: '/scripts/settings',
                    type: 'get',
                    data: {
                        type: 'retrieve-wishlist',
                        uid: $vm.loggedInUser.id
                    },
                    success: function(data) {
                        let $data = JSON.parse(data);
                        // console.log($data);

                        switch ($data.status.code) {
                            case (101 || '101'):
                                let wishlist_data = JSON.parse($data.data.wishlistData);
                                // console.log(wishlist_data);

                                wishlist_data.products = JSON.parse(wishlist_data.products);

                                if (wishlist_data.products.length < 1) {
                                    return
                                } else {
                                    // add wishlist data to local storage
                                    localStorage.setItem('idyl-wishlist', JSON.stringify(wishlist_data.products));
                                }


                                break;
                            case (404 || '404'):
                                console.log($data.data.msg);
                                return;
                                break;
                            default:

                        }

                    },
                    complete: function() {
                        let wishListExists = (localStorage.getItem('idyl-wishlist')) ? true : false,
                            $vm = this;

                        console.log(wishListExists);
                        console.log($nav_vue.loggedInStatus);

                        if (wishListExists && $nav_vue.loggedInStatus) {
                            let wishlistItems = JSON.parse(localStorage.getItem('idyl-wishlist'));

                            // used to change colour of wishlist heart to show its active
                            if (window.location.pathname.split('/')[1] === 'product') {
                                let skuid = window.location.pathname.split('/')[6];

                                if (typeof skuid === 'string') {
                                    for (var i = 0; i < wishlistItems.length; i++) {
                                        // if an item in wishlist matches current item add class to heart

                                        if (wishlistItems[i].stripesku_id === skuid) {
                                            console.log('THIS ITEM IS IN WISHLIST. HEART SHOULD BE BLACK');

                                            $('.wishlist-heart-icon').removeClass('fa-heart-o').addClass('fa-heart');
                                        }

                                        $nav_vue.wishlist.items.push(wishlistItems[i]);
                                        $nav_vue.wishlist.totalItems += 1;
                                    }
                                }

                            } else {
                                for (var i = 0; i < wishlistItems.length; i++) {
                                    $nav_vue.wishlist.items.push(wishlistItems[i]);
                                    $nav_vue.wishlist.totalItems += 1;
                                }
                            }

                            // set the wishlist counter to equal num of items in wishlist array
                            let wishlistLength = wishlistItems.length;
                            $nav_vue.wishlist.totalItems = wishlistLength;



                        } else {
                            console.log('no wishlist items in local storage');
                        }

                    },
                    error: function() {
                        console.log('error with wishlist DB check');
                    }
                })

                // if it exists parse and add to local storage for use




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
                        $nav_vue.loggedInUser.id = Cookies.get('idyl_qni');

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

                        // console.log($data);

                        switch ($data.status.code) {
                            case (101 || '101'):
                                // success
                                let $sessionData = JSON.parse($data.data.session);
                                if (!$vm.loggedInStatus) {
                                    // console.log($sessionData);
                                    $nav_vue.loggedInUser.id = $sessionData.idyl_qni;
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

                // update database if user is logged in

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
                /*
                    1. check if user is logged in
                        1.1 if user is logged in check if they have basket data stored in database
                        1.2 if true add to local storage and overwrite anything in it
                    2. else
                        2.1 use basket data in local storage
                */

                let $vm = this;

                setTimeout(function() {
                    if ($vm.loggedInStatus) {
                        // send request to DB to check if they have a stored basket session
                        console.log("User logged in status: " + $vm.loggedInStatus);
                        console.log("LOGGED IN USER ID: " + $vm.loggedInUser.id);
                        $.ajax({
                            url: '/scripts/settings',
                            type: 'post',
                            data: {
                                type: 'retrieve-basket',
                                uid: $vm.loggedInUser.id
                            },
                            success: function(data) {
                                let $data = JSON.parse(data),
                                    itemsExist = '';

                                console.log($data);

                                switch ($data.status.code) {
                                    case (101 || '101'):
                                        // update local storage basket item with retrieved basket data
                                        console.log($data.data.msg);
                                        // console.log($data.data.basketData);
                                        $data.data.basketData = JSON.parse($data.data.basketData);
                                        $data.data.basketData.products = JSON.parse($data.data.basketData.products);
                                        console.log($data.data.basketData.products);
                                        // console.log(JSON.parse($data.data.basketData));
                                        localStorage.setItem('basket', JSON.stringify($data.data.basketData.products));

                                        // then
                                        itemsExist = (localStorage.getItem('basket')) ? true : false;
                                        // $vm = this;

                                        console.log("EXISTS: " + itemsExist);
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
                                        break;
                                    case (404 || '404'):

                                        console.log($data.data.msg);

                                        itemsExist = (localStorage.getItem('basket')) ? true : false;
                                        // $vm = this;

                                        console.log("EXISTS: " + itemsExist);
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
                                        break;
                                    default:

                                }

                                // let itemsExist = (localStorage.getItem('basket')) ? true : false;
                                //     // $vm = this;
                                //
                                // console.log("EXISTS: "+ itemsExist);
                                // if (itemsExist) {
                                //     let option = {
                                //         action: 'render'
                                //     }
                                //     $vm.initializeBasket(option);
                                // } else {
                                //     let option = {
                                //         action: 'init'
                                //     }
                                //     $vm.initializeBasket(option);
                                //     // return false;
                                // }
                            },
                            error: function() {

                            }
                        })
                    } else {
                        console.log("User logged in status: " + this.loggedInStatus);

                        let itemsExist = (localStorage.getItem('basket')) ? true : false;
                        // $vm = this;

                        console.log("EXISTS: " + itemsExist);
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
                    }

                }, 1000);

            },
            initializeBasket: function(option) {
                if (option.action === 'render') {
                    // change setting of basketHasItems to true
                    this.basketHasItems = true;


                    // reset basket items before pulling from local storage
                    this.basket.items.splice(0, this.basket.items.length);
                    // console.log('reset basket items before pulling from local storage');

                    // get basket items from local storage
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
            updateBasketDB: function(bskt) {
                let $vm = this;

                $.ajax({
                    url: '/scripts/settings.php',
                    type: 'post',
                    data: {
                        type: 'update-basket',
                        uid: $vm.loggedInUser.id,
                        basket: JSON.stringify(bskt)
                    },
                    success: function(data) {
                        let $data = JSON.parse(data);
                        console.log($data);
                    },
                    error: function() {
                        console.log('error sending user basket data to Database');
                    }
                })
            },
            capitalizeFirstLetter: function(stringinp) {
                let splitStr = stringinp.split(' ');
                if (splitStr.length > 1) {
                    for (var i = 0; i < splitStr.length; i++) {
                        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].slice(1);
                    }
                    return splitStr.join(' ');
                } else {
                    return stringinp.charAt(0).toUpperCase() + stringinp.slice(1);
                }

            },
            closeMenu: function(e) {
                let target = $(e.target)[0].attributes[0].nodeValue,
                    $vm = this;

                console.log($(e.target)[0].attributes);
                console.log(target);
                switch (target) {
                    case 'livingroom':
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        setTimeout(function() {
                            $vm.menuStatus.livingroom = false;
                        }, 500);
                        break;
                    case 'bedroom':
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        setTimeout(function() {
                            $vm.menuStatus.bedroom = false;
                        }, 500);
                        break;
                    case 'bath':
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        setTimeout(function() {
                            $vm.menuStatus.bath = false;
                        }, 500);
                        break;
                    case 'kitchen':
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        setTimeout(function() {
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
                if (menuLinkName === 'mobile') {
                    if (!$vm.menuStatus.mobile) {
                        // open menu
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        // set menu content to be mobile
                        $vm.menuStatus.mobile = !$vm.menuStatus.mobile;


                        // open menu js

                    } else {
                        // close menu
                        $vm.menuStatus.open = !$vm.menuStatus.open;

                        $vm.menuStatus.mobile = !$vm.menuStatus.mobile;

                    }
                }else {
                    // NOTE: get nav data for menu dynamically

                    // open menu if its not already open
                    if (!$vm.menuStatus.open) {
                        $vm.menuStatus.open = !$vm.menuStatus.open;
                    }

                    // get menu data and add it to selected_nav
                    $links = [];
                    $cta_boxes = [];

                    $vm.products[menuLinkName].forEach(function(link, i){
                        // if false is true
                        if (!link[0]?true:false) {
                             $links.push(link);
                        }else {
                            $cta_boxes.push(link);
                        }
                    });

                    console.log($links);
                    console.log($cta_boxes);

                    $vm.menuStatus.selected_nav.links = $links;
                    $vm.menuStatus.selected_nav.cta_boxes = $cta_boxes[0];

                    // show loaded nav data
                    if (!$vm.menuStatus.selected) {
                        $vm.menuStatus.selected = true;
                    }


                }

                // switch (menuLinkName) {
                //     case 'mobile':
                //
                //
                //         break;
                //     // case 'livingroom':
                //     //     console.log('livingroom toggled');
                //     //     // open menu if its not already open
                //     //     if (!$vm.menuStatus.open) {
                //     //         $vm.menuStatus.open = !$vm.menuStatus.open;
                //     //     }
                //     //
                //     //     // reset all other menu status values
                //     //     $vm.menuStatus.mobile = false;
                //     //     $vm.menuStatus.kitchen = false;
                //     //     $vm.menuStatus.bath = false;
                //     //     $vm.menuStatus.bedroom = false;
                //     //
                //     //     // show living room menu information
                //     //     if ($vm.menuStatus.livingroom) {
                //     //         $vm.menuStatus.open = !$vm.menuStatus.open;
                //     //
                //     //         // stops menu info disappearing before menu has closed fully
                //     //         setTimeout(function() {
                //     //             $vm.menuStatus.livingroom = !$vm.menuStatus.livingroom;
                //     //         }, 500);
                //     //     } else {
                //     //         $vm.menuStatus.livingroom = !$vm.menuStatus.livingroom;
                //     //     }
                //     //
                //     //
                //     //     break;
                //     // case 'kitchen':
                //     //
                //     //     console.log('kitchen toggled');
                //     //     // open menu if its not already open
                //     //     if (!$vm.menuStatus.open) {
                //     //         $vm.menuStatus.open = !$vm.menuStatus.open;
                //     //
                //     //     }
                //     //
                //     //     // reset all other menu status values
                //     //     $vm.menuStatus.mobile = false;
                //     //     $vm.menuStatus.livingroom = false;
                //     //     $vm.menuStatus.bath = false;
                //     //     $vm.menuStatus.bedroom = false;
                //     //
                //     //     // show living room menu information
                //     //     if ($vm.menuStatus.kitchen) {
                //     //         $vm.menuStatus.open = !$vm.menuStatus.open;
                //     //
                //     //         // stops menu info disappearing before menu has closed fully
                //     //         setTimeout(function() {
                //     //             $vm.menuStatus.kitchen = !$vm.menuStatus.kitchen;
                //     //         }, 500);
                //     //
                //     //     } else {
                //     //         $vm.menuStatus.kitchen = !$vm.menuStatus.kitchen;
                //     //     }
                //     //
                //     //     break;
                //     // case 'bedroom':
                //     //
                //     //     console.log('bedroom toggled');
                //     //     // open menu if its not already open
                //     //     if (!$vm.menuStatus.open) {
                //     //         $vm.menuStatus.open = !$vm.menuStatus.open;
                //     //
                //     //     }
                //     //
                //     //     // reset all other menu status values
                //     //     $vm.menuStatus.mobile = false;
                //     //     $vm.menuStatus.livingroom = false;
                //     //     $vm.menuStatus.bath = false;
                //     //     $vm.menuStatus.kitchen = false;
                //     //
                //     //     // show living room menu information
                //     //     if ($vm.menuStatus.bedroom) {
                //     //
                //     //         $vm.menuStatus.open = !$vm.menuStatus.open;
                //     //
                //     //         // stops menu info disappearing before menu has closed fully
                //     //         setTimeout(function() {
                //     //             $vm.menuStatus.bedroom = !$vm.menuStatus.bedroom;
                //     //         }, 500)
                //     //
                //     //     } else {
                //     //         $vm.menuStatus.bedroom = !$vm.menuStatus.bedroom;
                //     //     }
                //     //
                //     //     break;
                //     // case 'bath':
                //     //     console.log('bath toggled');
                //     //     // open menu if its not already open
                //     //     if (!$vm.menuStatus.open) {
                //     //         $vm.menuStatus.open = !$vm.menuStatus.open;
                //     //
                //     //     }
                //     //
                //     //     // reset all other menu status values
                //     //     $vm.menuStatus.mobile = false;
                //     //     $vm.menuStatus.livingroom = false;
                //     //     $vm.menuStatus.kitchen = false;
                //     //     $vm.menuStatus.bedroom = false;
                //     //
                //     //     // show living room menu information
                //     //     if ($vm.menuStatus.bath) {
                //     //         // closes menu if link is pressed again
                //     //         $vm.menuStatus.open = !$vm.menuStatus.open;
                //     //
                //     //         // stops menu info disappearing before menu has closed fully
                //     //         setTimeout(function() {
                //     //             $vm.menuStatus.bath = !$vm.menuStatus.bath;
                //     //         }, 500)
                //     //
                //     //     } else {
                //     //         $vm.menuStatus.bath = !$vm.menuStatus.bath;
                //     //     }
                //     //     break;
                //     default:
                //
                // }

                // open menu


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
                    productInfo.price = productInfo.price / 100;

                    // create a new basketItem
                    let item = new BasketItem(productInfo.product, productInfo.id, productInfo.prod_name, productInfo.attributes.size, productInfo.attributes.color, productInfo.prod_slug, productInfo.prod_desc, productInfo.price, productInfo.image, this.prodQuantity, productInfo.attributes.category, productInfo.attributes.type);
                    //
                    console.log(item);

                    //check item wishlist exists in localStorage
                    let wishListStorage = (localStorage.getItem('idyl-wishlist')) ? true : false;

                    if (!wishListStorage) {
                        console.log('WISHLIST localStorage DOESNT EXIST');
                        this.wishlist.items.splice(0, this.wishlist.items.length);

                    } else {
                        console.log('WISHLIST localStorage EXISTS ');
                        this.wishlist.items = JSON.parse(localStorage.getItem('idyl-wishlist'));
                    }

                    let exists = this.checkItemExists(this.wishlist.items, item),
                        $vm = this;
                    console.log(exists);
                    if (exists[0]) {
                        for (var i = 0; i < $vm.wishlist.items.length; i++) {
                            if ($vm.wishlist.items[i].id === item.id) {
                                $vm.wishlist.items.splice(i, 1);

                                $.notify('item removed from wish list', 'error');

                                $('.wishlist-heart-icon').removeClass('fa-heart').addClass('fa-heart-o');

                                $nav_vue.wishlist.totalItems -= 1;

                                if ($nav_vue.wishlist.items.length < 1) {
                                    localStorage.removeItem('idyl-wishlist');
                                }
                            }
                        }
                    } else {
                        $('.wishlist-heart-icon').removeClass('fa-heart-o').addClass('fa-heart');

                        this.wishlist.items.push(item);
                        this.wishlist.totalItems += 1;

                        $.notify('item added to wish list', 'success');
                    }
                } else {
                    $.notify('You have to be logged in to add items to your wishlist. create an account today', 'warn');
                }



            },
            updateWishlistDB: function(wlist) {
                let $vm = this;

                $.ajax({
                    url: '/scripts/settings.php',
                    type: 'post',
                    data: {
                        type: 'update-wishlist',
                        wishlist: wlist,
                        uid: $vm.loggedInUser.id
                    },
                    success: function(data) {
                        let $data = JSON.parse(data);
                        console.log('WISHLIST DB RESPONSE');

                        console.log($data);
                    },
                    error: function() {
                        console.log('error updating wishlist database');
                    }
                })
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

            setTimeout(function() {
                $('.loader-generic').fadeOut();
                $('body').css({
                    'overflow-y': 'scroll'
                });
            }, 1500)


            this.checkSigninCookies();
            this.checkSigninSession();
            this.checkBasketSession();
            this.getNavdata();
        },
        created: function() {


        },
        watch: {
            accountMenu: function(value) {
                if (value) {
                    $('.custom-menu').removeClass('custom-menu-closed').addClass('custom-menu-open');
                } else {
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
            searchStatus: function(value) {
                if (!value) {
                    $('.search-bar').removeClass('search-open').addClass('search-hidden');
                    $('.fa-close').removeClass('fa-close f-active').addClass('fa-search').css({'font-size':'1em'});

                    $('.search-input').animate({
                        opacity: 0
                    }, 300);

                    // fade out search results container
                    $('.search-listings').fadeOut();

                } else if (value) {
                    $('.search-input').animate({
                        opacity: 1
                    }, 1000);

                    $('.search-bar').removeClass('search-hidden').addClass('search-open');
                    $('.fa-search').removeClass('fa-search').addClass('fa-close f-active').css({'transition':'all .3s'});

                    if ($('.search-listing-values')[0].scrollTop > 0) {
                        $('.search-listing-values')[0].scrollTop = 0
                    }

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
                } else if (value) {
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

        }

    })

    $nav_vue.$watch('menuStatus.open', function(newVal, oldVal) {
        if (newVal) {
            // open menu
            $('.menu-box').removeClass('menu-closed').addClass('menu-open');
        } else {
            $('.menu-box').removeClass('menu-open').addClass('menu-closed');
        }
    });

    $nav_vue.$watch('menuStatus.selected_nav.links', function(newVal, oldVal) {

    });

    $nav_vue.$watch('menuStatus.mobile', function(newVal, oldVal) {
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

        } else {
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
        console.log(newVal);
        localStorage.setItem('idyl-wishlist', JSON.stringify(newVal));
        $nav_vue.updateWishlistDB(localStorage.getItem('idyl-wishlist'));

        setTimeout(function() {
            console.log(JSON.parse(localStorage.getItem('idyl-wishlist')));
        }, 300);

    });

    // stripe js code
    if (window.location.pathname === '/myaccount/home') {
        console.log('true');
        $('footer').addClass('d-none');
    }

    if (window.location.pathname.split('/')[1] === 'checkout') {
        var handler = StripeCheckout.configure({
            key: 'pk_test_o1lkn4I74t5tIEB8rdzKbCtp',
            image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
            locale: 'auto',
            opened: function() {
                console.log('checkout opened');
                let orderID = $('.payOrder').attr('data-order-id'),
                    easypostOrderID = $('.payOrder').attr('data-easypost-order-id');

                console.log(easypostOrderID);

                localStorage.setItem('idyl-order-id', orderID);
                localStorage.setItem('idyl-easypost-order-id', easypostOrderID);
            },
            token: function(token, args) {
                // You can access the token ID with `token.id`.
                // Get the token ID to your server-side code for use.
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

                let orderID = localStorage.getItem('idyl-order-id'),
                    easypostID = localStorage.getItem('idyl-easypost-order-id');
                $.ajax({
                    url: '/scripts/payorder.php',
                    type: 'post',
                    data: {
                        token: stripetoken,
                        order: orderID,
                        easypost: easypostID
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
                    // console.log(val);
                    // console.log(val.data.shippment_details);
                    // console.log(JSON.parse(val.data.shippment_details));
                    // console.log(JSON.parse(val));
                    let cookieLocation = '',
                        orderID = '';

                    switch (val.status.code) {
                        case (101 || '101'):
                            $.notify(val.data.msg, val.status.code_status);
                            orderID = localStorage.getItem('idyl-order-id');

                            // delete local storage order data
                            localStorage.removeItem('idyl-order-id');
                            localStorage.removeItem('idyl-easypost-order-id');
                            console.log('local storage order id removed');

                            // delete checkout cookie
                            cookieLocation = localStorage.getItem('checkout-cookie-location');
                            Cookies.remove('trans_local_token', {
                                path: cookieLocation
                            });

                            //delete basket data
                            // (front end (NOTE: all users)
                            // in database (NOTE:logged in users only))
                            localStorage.removeItem('basket');
                            $nav_vue.emptyBasket();

                            // delete basket data from database
                            if ($nav_vue.loggedInStatus) {
                                $.ajax({
                                    url: '/scripts/deletebasketdata.php',
                                    type: 'post',
                                    data: {
                                        cusID: $nav_vue.loggedInUser.id
                                    },
                                    success: function(data) {
                                        let $data = JSON.parse(data);

                                        console.log("---------------");
                                        console.log("DELETE BASKET DATA BELOW");
                                        console.log("---------------");
                                        console.log($data);

                                        setTimeout(function() {
                                            window.location = '/order/confirmation/' + orderID;
                                        }, 2000);
                                    },
                                    error: function() {
                                        console.log('error with DELETE BASKET DATA ajax');
                                    }
                                })
                            } else {
                                setTimeout(function() {
                                    window.location = '/order/confirmation/' + orderID;
                                }, 2000);
                            }


                            break;
                        case (404 || '404'):
                            $.notify(val.data.msg, 'error');
                            orderID = localStorage.getItem('idyl-order-id');

                            // delete local storage order data
                            localStorage.removeItem('idyl-order-id');
                            localStorage.removeItem('idyl-easypost-order-id');
                            console.log('local storage order id removed');

                            // delete checkout cookie
                            cookieLocation = localStorage.getItem('checkout-cookie-location');
                            Cookies.remove('trans_local_token');

                            //delete basket data
                            // (front end (NOTE: all users)
                            // in database (NOTE:logged in users only))
                            localStorage.removeItem('basket');
                            $nav_vue.emptyBasket();

                            if ($nav_vue.loggedInStatus) {
                                $.ajax({
                                    url: '/scripts/deletebasketdata.php',
                                    type: 'post',
                                    data: {
                                        cusID: $nav_vue.loggedInUser.id
                                    },
                                    success: function(data) {
                                        let $data = JSON.parse(data);

                                        console.log("---------------");
                                        console.log("DELETE BASKET DATA BELOW");
                                        console.log("---------------");
                                        console.log($data);

                                        setTimeout(function() {
                                            window.location = '/order/confirmation/' + orderID;
                                        }, 2000);
                                    },
                                    error: function() {
                                        console.log('error with DELETE BASKET DATA ajax');
                                    }
                                })
                            } else {
                                setTimeout(function() {
                                    window.location = '/order/confirmation/' + orderID;
                                }, 2000);
                            }

                            break;
                        case (401 || '401'):
                            $.notify(val.data.msg, 'warn');
                            console.log(val);
                            break;
                        default:

                    }
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
                basket: {

                },
                wishlist: {

                }
            },
            methods: {
                removeFromWishlist: function(e) {
                    console.log($(e.target));
                    let productInfo = JSON.parse($(e.target)[0].attributes[0].nodeValue);

                    console.log(productInfo);

                    for (var i = 0; i < $nav_vue.wishlist.items.length; i++) {
                        // console.log($nav_vue.wishlist.items[i].stripesku_id);
                        // console.log(productInfo.stripesku_id);
                        if ($nav_vue.wishlist.items[i].stripesku_id === productInfo.stripesku_id) {
                            $nav_vue.wishlist.items.splice(i, 1);

                            $.notify('item removed from wish list', 'error');

                            $nav_vue.wishlist.totalItems -= 1;
                        }
                    }

                    if ($nav_vue.wishlist.items.length < 1) {
                        localStorage.removeItem('idyl-wishlist');
                    }

                },
                checkItemExists: function(itm) {
                    console.log('clicked');
                    console.log(itm);
                    // this.item = itm;
                    let exists = $nav_vue.checkItemExists($nav_vue.basket.items, itm);

                    if (exists[0]) {
                        // this.inBasket = true;
                        return true;
                    } else {
                        // this.inBasket = false;
                        return false;

                    }
                },
                updateDetails: function(e) {
                    let eventTrigger = $(e.target).parent(),
                        $userID = eventTrigger[0].attributes[1].nodeValue,
                        $userStripeID = eventTrigger[0].attributes[2].nodeValue,
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
                    } else {
                        let updatedDetails = new UpdateUserDetails($userID, $userStripeID, $userTitleVal, $userFname, $userLname, $dob);

                        console.log(updatedDetails);

                        // send ajax to update user details
                        $.ajax({
                            url: '/scripts/settings.php',
                            type: 'post',
                            data: {
                                type: 'user-details',
                                details: updatedDetails
                            },
                            success: function(data) {
                                let $data = JSON.parse(data);
                                console.log($data);

                                switch ($data.status.code) {
                                    case (101 || '101'):

                                        $('#details-success').html($data.data.msg);

                                        setTimeout(function() {
                                            $('#details-success').html('');
                                        }, 3000);

                                        break;
                                    case (404 || '404'):

                                        $('#details-success').html($data.data.msg);

                                        setTimeout(function() {
                                            $('#details-success').html('');
                                        }, 3000);
                                        break;
                                    default:

                                }
                            },
                            error: function() {
                                console.log('error sending details to be updated. contact help');
                            }
                        })
                    }


                },
                updateLoginDetails: function(e) {
                    let eventTrigger = $(e.target).parent(),
                        $userID = eventTrigger[0].attributes[1].nodeValue,
                        $userStripeID = eventTrigger[0].attributes[2].nodeValue,
                        $email = eventTrigger[0][0].value,
                        $emailConfirm = eventTrigger[0][1].value,
                        $password = eventTrigger[0][2].value,
                        $passConfirm = eventTrigger[0][3].value,
                        $vm = this,
                        emailtrue = false,
                        passwordtrue = false;

                    console.log(eventTrigger);

                    // check to make sure fields are not empty
                    if (!$email || !$emailConfirm || !$password || !$passConfirm) {

                        $('#login-details-message').html('Login details cant be changed. One or more fields are empty');

                        setTimeout(function() {
                            $('#login-details-message').html('');
                        }, 4000);
                        return;
                    }

                    // check to make sure confirm fields match
                    if ($email !== $emailConfirm) {
                        // alert user
                        $('#email-check').html('Emails don\'t match. Please re-enter');

                        setTimeout(function() {
                            $('#email-check').html('');
                        }, 4000);

                    } else {
                        emailtrue = !emailtrue;
                    }

                    if ($password !== $passConfirm) {
                        $('#pass-check').html('Passwords don\'t match. Please re-enter');

                        setTimeout(function() {
                            $('#pass-check').html('');
                        }, 4000);
                    } else {
                        passwordtrue = !passwordtrue;
                    }

                    // send ajax to update user login details
                    if (emailtrue && passwordtrue) {
                        console.log('details are ready to be submitted via ajax');

                        let updatedLoginDetails = new UpdateLoginDetails($userID, $userStripeID, $email, $emailConfirm, $password, $passConfirm);

                        $.ajax({
                            url: '/scripts/settings.php',
                            type: 'post',
                            data: {
                                type: 'login-details',
                                details: updatedLoginDetails
                            },
                            success: function(data) {
                                let $data = JSON.parse(data);

                                switch ($data.status.code) {
                                    case (101 || '101'):
                                        $('#login-details-message').html($data.data.msg);

                                        // update current email dom element to reflect new email changes
                                        $('#user-email').html($data.data.email);

                                        // reset form

                                        // clear success message
                                        setTimeout(function() {
                                            $('#login-details-message').html('');
                                        }, 4000);

                                        break;
                                    case (404 || '404'):
                                        $('#login-details-message').html($data.data.msg);

                                        // clear error message
                                        setTimeout(function() {
                                            $('#login-details-message').html('');
                                        }, 4000);

                                        break;
                                    default:

                                }
                                console.log($data);
                            },
                            error: function() {

                            }
                        })
                    }

                },
                getBasketInfo: function() {
                    this.basketCount = $nav_vue.basketCount;
                    this.basket = $nav_vue.basket;
                },
                getWishlistInfo: function() {
                    this.wishlist = $nav_vue.wishlist;
                },
                phonenumber: function(inputtxt) {
                    let phoneno = /^\d{11}$/;
                    if (inputtxt.match(phoneno)) {
                        return true;
                    } else {
                        return false;
                    }
                },
                validatePostCode: function(postcode) {
                    let $data = '',
                        $vm = this;

                },
                addAddress: function(e) {
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
                        $status = eventTrigger[0][10],
                        $status_selected = '',
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
                    for (var j = 0; j < $status.length; j++) {
                        if ($status[j].selected) {
                            $status_selected = $status[j].value;
                        }
                    }


                    //validate phone number
                    let phone_real = this.phonenumber($phone_num);

                    // add default value to address 2 & 3 if they havent been entered;
                    $address2 = (!$address2) ? 'false' : $address2;
                    $address3 = (!$address3) ? 'false' : $address3;


                    /*
                        NOTE: postcodes.io API
                    */
                    // verifying the user entered post code with postcodes.io
                    $.ajax({
                        url: `https://api.postcodes.io/postcodes/${$post_code}/validate`,
                        type: 'get',
                        success: function(data) {
                            let validateSuccess = new Promise(function(resolve, reject) {
                                if (data.status === 200) {
                                    resolve(data.result);
                                } else {
                                    reject(false);
                                }
                            });

                            validateSuccess.then(function(val) {
                                // if ($data.result) {
                                console.log(val);
                                if (!$userFname || !$userLname || !$phone_num || !$address1 || !$city_town || !$post_code || $userTitleVal === 'default' || !phone_real || !val) {

                                    $.notify('Required fields haven\'t been filled in', 'error');

                                    if (!val) {
                                        $('#postcode-input').css({
                                            'border': '2px solid red'
                                        });
                                        $('#postcode-input-mesage').html('please enter a valid postcode');
                                        $('#postcode-input-message').css({
                                            'color': 'red'
                                        });

                                        setTimeout(function() {
                                            $('#postcode-input-mesage').html('');
                                        }, 5000);
                                    }

                                    if (!phone_real) {
                                        console.log('PHONE NOT REAL');
                                        $('#phone-input-address').css({
                                            'border': '2px solid red'
                                        });
                                        $('#phone-input-message').html('Please enter a valid phone number')
                                        $('#phone-input-message').css({
                                            'color': 'red'
                                        });

                                        setTimeout(function() {
                                            $('#phone-input-message').html('');
                                        }, 5000);
                                    }

                                    return;
                                } else {
                                    // create a class that represents address being added
                                    let address = new Address($userTitleVal, $userFname, $userLname, $phone_num, $address1, $address2, $address3, $city_town, $post_code, $country, $status_selected);


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

                            }).catch((reason) => {
                                console.log(reason);
                            });


                        },
                        error: function() {
                            console.log('error validating postcode');
                        }
                    })

                },
                editaddressDirect: function(e) {
                    let eventTrigger = $(e.target),
                        targetpage = eventTrigger[0].href,
                        posID = eventTrigger.parent().attr('data-index');

                    // set cookie of address pos in array
                    Cookies.set('idyl-address-pos', posID);
                    console.log(targetpage);
                    console.log(posID);

                    setTimeout(function() {
                        window.location = targetpage;
                    }, 200);
                },
                editAddress: function(e) {
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
                        $status = eventTrigger[0][10],
                        $status_selected = '',
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
                    for (var j = 0; j < $status.length; j++) {
                        if ($status[j].selected) {
                            $status_selected = $status[j].value;
                        }
                    }


                    //validate phone number
                    let phone_real = this.phonenumber($phone_num);

                    // add default value to address 2 & 3 if they havent been entered;
                    $address2 = (!$address2) ? 'false' : $address2;
                    $address3 = (!$address3) ? 'false' : $address3;

                    /*
                        NOTE: postcodes.io API
                    */
                    // verifying the user entered post code with postcodes.io
                    $.ajax({
                        url: `https://api.postcodes.io/postcodes/${$post_code}/validate`,
                        type: 'get',
                        success: function(data) {
                            let validateSuccess = new Promise(function(resolve, reject) {
                                if (data.status === 200) {
                                    resolve(data.result);
                                } else {
                                    reject(false);
                                }
                            });

                            validateSuccess.then(function(val) {
                                // if ($data.result) {
                                console.log(val);
                                if (!$userFname || !$userLname || !$phone_num || !$address1 || !$city_town || !$post_code || $userTitleVal === 'default' || !phone_real || !val) {

                                    $.notify('Required fields haven\'t been filled in', 'error');

                                    if (!val) {
                                        $('#postcode-input').css({
                                            'border': '2px solid red'
                                        });
                                        $('#postcode-input-mesage').html('please enter a valid postcode');
                                        $('#postcode-input-message').css({
                                            'color': 'red'
                                        });

                                        setTimeout(function() {
                                            $('#postcode-input-mesage').html('');
                                        }, 5000);
                                    }

                                    if (!phone_real) {
                                        console.log('PHONE NOT REAL');
                                        $('#phone-input-address').css({
                                            'border': '2px solid red'
                                        });
                                        $('#phone-input-message').html('Please enter a valid phone number')
                                        $('#phone-input-message').css({
                                            'color': 'red'
                                        });

                                        setTimeout(function() {
                                            $('#phone-input-message').html('');
                                        }, 5000);
                                    }

                                    return;
                                } else {
                                    // create a class that represents address being added
                                    let address = new Address($userTitleVal, $userFname, $userLname, $phone_num, $address1, $address2, $address3, $city_town, $post_code, $country, $status_selected);

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

                            }).catch((reason) => {
                                console.log(reason);
                            });


                        },
                        error: function() {
                            console.log('error validating postcode');
                        }
                    })
                },
                deleteAddress: function(e) {
                    let eventTrigger = $(e.target),
                        addressPositionID = eventTrigger.parent().attr('data-index');

                    $.ajax({
                        url: '/scripts/settings.php',
                        type: 'post',
                        data: {
                            type: 'delete-address',
                            position: addressPositionID
                        },
                        success: function(data) {
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
                        error: function() {

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
    console.log(window.location.pathname.split('/')[1]);


    if (window.location.pathname.split('/')[1] !== 'myaccount' && window.location.pathname.split('/')[1] !== 'help' && window.location.pathname.split('/')[1] !== 'termsconditions' && window.location.pathname.split('/')[1] !== 'privacy-policy') {
        console.log('home visible');

        // NOTE: rewrite what props the basket item uses to match basket-item 1
        let basketItem2 = {
            data: function() {
                return {
                    status: 'component works'
                }
            },
            props: ['itemid', 'itemname', 'productimage', 'quantity', 'price', 'index', 'prodcolor', 'prodsize'],
            template: `<div class="card basket-card" :id="'basket-checkout-item-'+index"> <div class="card-body"> <div class="row"> <div class="col-12 basket-card-body d-flex flex-wrap flex-row"> <div class="p-2 d-flex flex-row justify-content-center align-items-center image-checkout-col"> <img :src="productimage" :alt="itemname"> </div> <div class="p-2"> <div class="info-checkout-container"> <p class="card-subtitle mb-2">£{{price.toFixed(2)}}</p> </div> <div class="info-checkout-container"> <h6 class="card-title">{{itemname}}<br>{{capitalizeFirstLetter(prodcolor)}} <span v-if="prodsize !== 'none'">- {{capitalizeFirstLetter(prodsize)}}</span></h6> </div> <div class="info-checkout-container"> <p class="card-subtitle mb-2 text-muted"> <span v-if="prodsize !== 'none'"> <strong>Size:</strong>{{capitalizeFirstLetter(prodsize)}}&nbsp; </span> <span> <strong>Qty:</strong>{{quantity}}</span> </p> </div> <div class="info-checkout-container"> <hr class="d-lg-none"> <p class="card-subtitle mb-2"> <strong>Total: £{{price*quantity.toFixed(2)}}</strong> </p> </div> </div> <div class="p-2 d-flex flex-row justify-content-center align-items-center" v-bind:data-position-id="index" v-bind:data-element-id="'basket-checkout-item-'+index"> <span class="fa fa-trash-o mb-2" v-bind:id="itemid" v-on:click="removeItem"></span> </div> </div> </div> </div> </div>`,
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
                    // getting the correct items details from the basket array
                    let itemID = parseInt($(e.target).parent().attr('data-position-id'))
                    itemrowID = '#' + $(e.target).parent().attr('data-element-id'),
                        selectedItem = $nav_vue.basket.items[itemID];


                    if (selectedItem.quantity > 1) {

                        selectedItem.quantity -= 1;
                        selectedItem.total_price -= selectedItem.price;
                        $nav_vue.basketTotal -= selectedItem.price;
                        $home_vue.basketTotal -= selectedItem.price;
                        localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                        // update database with latest basket info
                        if ($nav_vue.loggedInStatus) {
                            console.log('--------ITEM REMOVED FROM BASKET ON BASKET PAGE');
                            $nav_vue.updateBasketDB($nav_vue.basket.items);
                        }

                    } else {

                        if ($nav_vue.basket.items.length === 1) {
                            $nav_vue.emptyBasket();
                            $home_vue.basketHasItems = false;
                            console.log('HOME VUE basketHasItems STATUS BELOW');
                            console.log($home_vue.basketHasItems);
                            $home_vue.basketTotal = 0;
                            // update database with latest basket info
                            if ($nav_vue.loggedInStatus) {
                                console.log('---------LAST ITEM REMOVED FROM BASKET ON BASKET PAGE');
                                $nav_vue.updateBasketDB($nav_vue.basket.items);
                            }

                            return;
                        }
                        $nav_vue.basketCount -= 1;
                        $nav_vue.basketTotal -= selectedItem.total_price;
                        $home_vue.basketTotal -= selectedItem.total_price;

                        console.log(itemrowID);
                        console.log(itemID);

                        $(itemrowID).fadeOut().remove();

                        // delete from array
                        console.log($nav_vue.basket.items);
                        $nav_vue.basket.items.splice(itemID, 1);
                        console.log($nav_vue.basket.items);

                        localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                        // update database with latest basket info
                        if ($nav_vue.loggedInStatus) {
                            $nav_vue.updateBasketDB($nav_vue.basket.items);
                        }
                    }
                }
            }
        };

        // create product card when show more is clicked

        let productCard = {
            data: function() {
                return {
                    status: 'component works',
                    properties: {
                        image: {
                            alt: '',
                            address: ''
                        },
                        productdata: {
                            category: '',
                            type: '',
                            slug: '',
                            color: '',
                            size: '',
                            prod_id: '',
                            sku_id: '',
                            price: ''
                        }

                    }
                }
            },
            props: ['skuimage'],
            template: `<div class="col-6 col-md-4 col-lg-3 product-card-col">
                <div class="card product-card" style="">
                    <div class="product-image">
                        <img class="card-img-top" src="" alt="">
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2"><a href="">{{this.status}}</a></h6>
                        <p class="product-price-p"><strong>£ 45</strong> </p>
                    </div>
                </div>
            </div>`,
            methods: {
                populateData: function() {

                },
                returnTemplate: function() {
                    return this.template;
                }
            }
        }

        let filterItem = {
            data: function() {
                return {
                    status: 'component works'
                }
            },
            props: ['filtername', 'activetype'],
            template: `<li>
                <div class="input-group mb-0 filter-input-group">
                    <div class="input-group-prepend filter-input-box">
                        <div class="input-group-text filter-input d-flex flex-row">
                            <div class="p-2 fltr-inp">
                                <input class="type-checkbox" :name="filtername" type="checkbox" :data-prod-type="filtername" aria-label="Checkbox for following text input" :checked="activetype ?true:false" @click="toggleFilter">
                            </div>

                            <div class="p-2 fltr-inp">
                                <p>{{ capitalizeFirstLetter(filtername)}}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </li>`,
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
                returnTemplate: function(skuimage, skuname, skucategory, skutype, skuslug, skucolor, skusize, skuprodid, skuid, skuprice) {
                    //
                    let productCard = `<div class="col-6 col-md-4 col-lg-3 product-card-col">
                        <div class="card product-card" style="">
                            <div class="product-image">
                                <img class="card-img-top" src="${skuimage}" alt=${skuname}>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2"><a href="/product/${skucategory}/${skutype}/${skuslug}-${skucolor}-${skusize}/${skuprodid}/${skuid}">${skuname} - ${skucolor} - ${skusize}</a></h6>
                                <h6 class="">${skucategory}</h6>
                                <p class="product-price-p"><strong>£ ${skuprice/100}</strong> </p>
                            </div>
                        </div>
                    </div>`;

                    return productCard;
                },
                toggleFilter: function(e) {
                    console.log('type checkbox clicked');
                    let targetCheckbox = $(e.target);
                    allCheckboxes = document.querySelectorAll('.type-checkbox'),
                        categoryCheckboxes = document.querySelectorAll('.cat-checkbox'),
                        checkBoxValues = [],
                        category = '',
                        $vm = this;

                    // add loader to products box

                    console.log(targetCheckbox);
                    console.log(allCheckboxes);
                    console.log(categoryCheckboxes);

                    for (var j = 0; j < categoryCheckboxes.length; j++) {
                        if (categoryCheckboxes[j].checked) {
                            category = categoryCheckboxes[j].attributes['data-category'].value;
                            // console.log(categoryCheckboxes[j].attributes['data-category'].value);
                        } else {
                            category = 'all';
                        }
                    }

                    for (var i = 0; i < allCheckboxes.length; i++) {
                        if (allCheckboxes[i].checked) {
                            checkBoxValues.push(allCheckboxes[i].attributes['data-prod-type'].value);
                        }
                    }


                    console.log(checkBoxValues);
                    console.log(category);

                    if (window.location.pathname.split('/')[2] === 'brands') {
                        console.log('BRANDS PAGE. FILTER BRANDS');
                        category = 'brands';
                    }

                    // clear the current selection
                    $('.product-card-col').remove();

                    // show loader in box for 2 seconds
                    $('.loader-filter').css({
                        'z-index': '20',
                        'visibility': 'visible',
                        'display': 'block'
                    });

                    // send ajax over with the selected values array
                    $.ajax({
                        url: '/scripts/filter_products.php',
                        type: 'get',
                        data: {
                            filters: checkBoxValues,
                            category: category,
                            selected_brand: window.location.pathname.split('/')[3]
                        },
                        success: function(data) {
                            let $data = JSON.parse(data);

                            console.log($data);


                            setTimeout(function() {
                                $('.loader-filter').css({
                                    'z-index': '1',
                                    'visibility': 'hidden'
                                });

                                $('.product-card-col').remove();
                                // render products on screen
                                for (var i = 0; i < $data.data.filtered_skus.length; i++) {
                                    // skuimage, skuname, skucategory, skutype, skuslug, skucolor, skusize, skuprodid, skuid, skuprice
                                    let productMarkup = $vm.returnTemplate($data.data.filtered_skus[i].image, $data.data.filtered_skus[i].prod_name, $data.data.filtered_skus[i].attributes.category, $data.data.filtered_skus[i].attributes.type, $data.data.filtered_skus[i].prod_slug, $data.data.filtered_skus[i].attributes.color, $data.data.filtered_skus[i].attributes.size, $data.data.filtered_skus[i].product, $data.data.filtered_skus[i].id, $data.data.filtered_skus[i].price);

                                    $('#products-row').append(productMarkup);
                                }

                            }, 2000);

                            // console.log($vm.returnTemplate());

                        },
                        error: function() {
                            console.log('ERROR WITH FILTER AJAX');
                        }
                    })


                }

            }
        }


        let $home_vue = new Vue({
            el: '.home',
            components: {
                'basket-item-checkout': basketItem2,
                'product-card': productCard,
                'filter-item': filterItem
            },
            data: {
                window: window,
                slidesActive: true,
                selectedProduct: false,
                prodQuantity: 1,
                product: '',
                featuredProducts: [],
                createUserSuccess: '',
                basketHasItems: false,
                basketTotal: 0,
                filterStatus: false,
                checkoutValues: {
                    savedDetails: false,
                    savedShipping: false,
                },
                basket: {
                    items: ''
                },
                slides: '',
                categories: [{
                        name: 'living room',
                        image: '/assets/category/christelle-bourgeois-97314.jpg',
                        categoryLink: '/products/livingroom',
                        key: 'LIV',
                        slug: 'livingroom',
                        currentPage: window.location.pathname.split('/')[2] === 'livingroom' ? window.location.pathname.split('/')[2] : 'all'
                    },
                    {
                        name: 'kitchen',
                        image: '/assets/category/alison-marras-361007.jpg',
                        categoryLink: '/products/kitchen',
                        key: 'KIT',
                        slug: 'kitchen',
                        currentPage: window.location.pathname.split('/')[2] === 'kitchen' ? window.location.pathname.split('/')[2] : 'all'
                    },
                    {
                        name: 'bedroom',
                        image: '/assets/category/krista-mcphee-445060.jpg',
                        categoryLink: '/products/bedroom',
                        key: 'BED',
                        slug: 'bedroom',
                        currentPage: window.location.pathname.split('/')[2] === 'bedroom' ? window.location.pathname.split('/')[2] : 'all'
                    },
                    {
                        name: 'bath',
                        image: '/assets/category/david-cohen-127022.jpg',
                        categoryLink: '/products/bath',
                        key: 'BTH',
                        slug: 'bath',
                        currentPage: window.location.pathname.split('/')[2] === 'bath' ? window.location.pathname.split('/')[2] : 'all'
                    }
                ],
                products: {

                },
                loaded:{
                    filter_list: false
                },
                mainImage: {
                    previousClick: '#p-img-1'
                }
            },
            methods: {
                getCategoryData: function(){
                    let $vm = this;

                    $.ajax({
                        url: '/scripts/get_nav_data.php',
                        type: 'post',
                        data: {
                            nav: true
                        },
                        success: function(data){
                            let $data = JSON.parse(data);

                            console.log($data);

                            // format and structure data
                            let sublink_navs = $data.info.link_types.submenu_navs;
                                single_navs = $data.info.link_types.singlem_navs;
                                category_products_data = {};

                            for (var i = 0; i < sublink_navs.length; i++) {

                                let sublink_inner_cats = sublink_navs[i].nav_json_data.submenu_categories;

                                // update products array with all categories and their sub-categories

                                // add category to products array

                                $vm.products[sublink_navs[i].nav_json_data.slug] = [];

                                for (var j = 0; j < sublink_inner_cats.length; j++) {
                                    let navlink_data = {
                                        key: '',
                                        cat: '',
                                        slug: '',
                                        name: '',
                                        currentPage: '',
                                        checkCurrentPage: function(){
                                             window.location.pathname.split('/')[3] === this.slug ? this.currentPage = true : this.currentPage = false
                                        }
                                    }

                                    navlink_data.key = '#filter-'+ sublink_inner_cats[j].slug+sublink_navs[i].id;
                                    navlink_data.cat = sublink_navs[i].nav_json_data.slug;
                                    navlink_data.slug = sublink_inner_cats[j].slug;
                                    navlink_data.name = sublink_inner_cats[j].title;


                                    navlink_data.checkCurrentPage();

                                    // console.log(navlink_data);

                                    $vm.products[sublink_navs[i].nav_json_data.slug].push(navlink_data);
                                    $nav_vue.searchListing.categories.push(navlink_data);

                                }

                            }

                            // show filters on products page
                            $vm.loaded.filter_list = true;
                        }
                    })
                },
                getSlideData: function() {
                    let $vm = this;
                    $.ajax({
                        url: '/scripts/get_slide_data.php',
                        type: 'get',
                        success: function(data){
                            let $data = JSON.parse(data);
                            console.log($data);
                            switch ($data.status.code) {
                                case (101 || '101'):
                                    let slideData = JSON.parse($data.data.slides.slides_json);

                                    console.log(slideData);
                                    $vm.slides = slideData;
                                    break;
                                case (404 || '404'):
                                    $.notify('error getting slide data', 'error');
                                    break;
                                default:

                            }

                        },
                        error: function(){

                        }
                    })
                },
                toggleMainImage: function(e) {
                    let targetImage = $(e.target)[0],
                        mainImageID = $('#main'),
                        targetImage_ID = '#' + targetImage.attributes.id.value,
                        targetImage_src = targetImage.attributes.src.value,
                        $vm = this;

                    if ($vm.mainImage.previousClick === targetImage_ID) {
                        return;
                    } else {
                        $($vm.mainImage.previousClick).removeClass('active-img');
                        $(targetImage_ID).addClass('active-img');

                        mainImageID.attr('src', targetImage_src);
                        $vm.mainImage.previousClick = targetImage_ID;
                    }

                },
                saveCustomerDetails: function(e) {
                    let targetButton = $(e.target)[0],
                        targetType = $(targetButton).attr('data-save-type'),
                        $title = $('.inputTitle')[0].children,
                        $userTitleVal = '',
                        $fname = $('#validationfname')[0].value,
                        $lname = $('#validationlname')[0].value,
                        $email = $('#validationDefaultEmail')[0].value,
                        $dob = $('#userAge')[0].value;


                    // get the selected option from list
                    for (var i = 0; i < $title.length; i++) {
                        if ($title[i].selected) {
                            $userTitleVal = $title[i].value;
                        }
                    }

                    let date = new Date();
                    year = date.getFullYear();
                    userBirthYear = Math.floor($dob.split('-')[0]),
                        minBirthYear = year - 18;


                    if (!$fname || !$lname || !$dob || $userTitleVal === 'default') {
                        $('.save-p-details').notify('One or more fields are invalid or empty.', 'warn');

                        return;
                    } else if (userBirthYear > minBirthYear) {
                        $('.age-error').notify('You must be older than 18');
                        return;
                    } else {
                        // send ajax to update session for personal details
                        let $user = new User($userTitleVal, $fname, $lname, $dob, $email, false);

                        console.log($user);

                        $.ajax({
                            url: '/scripts/guestcheckoutsession.php',
                            type: 'post',
                            data: {
                                type: targetType,
                                user_details: $user
                            },
                            success: function(data) {
                                console.log(data);
                                let $data = JSON.parse(data),
                                    $vm = this;

                                if ($data.status.code === (101 || '101')) {
                                    $('.disabled-shipping').css({
                                        'opacity': '0',
                                        'z-index': '-1'
                                    });
                                    $('.disabled-details').css({
                                        'opacity': '0.6',
                                        'z-index': '10'
                                    });

                                    // $vm.checkoutValues.savedDetails = true;
                                } else if ($data.status.code === (404 || '404')) {
                                    $.notify($data.data.msg, 'error');
                                }
                            },
                            error: function() {
                                $.notify('error with saving user details: CHECKOUT 404');
                            }
                        })

                    }



                },
                saveShippingDetails: function(e) {

                    let targetButton = $(e.target)[0],
                        targetType = $(targetButton).attr('data-save-type'),
                        $address1 = $('#validationAddress1')[0].value,
                        $address2 = $('#validationAddress2')[0].value,
                        $city_town = $('#validationCity')[0].value,
                        $post_code = $('#validationPostcode')[0].value.replace(/ /g, ''),
                        $country = $('.validationCountry')[0].children[0].value,
                        $phone_num = $('#validationNumber')[0].value.replace(/ /g, ''),
                        //validate phone number
                        phone_real = this.phonenumber($phone_num);

                    // add default value to address 2 & 3 if they havent been entered;
                    $address2 = (!$address2) ? 'false' : $address2;

                    console.log($address1);
                    console.log($address2);
                    console.log($city_town);
                    console.log($post_code);
                    console.log($country);
                    console.log($phone_num);
                    console.log(targetType);

                    let postCodeStatus = '',
                        validatePostcode = new Promise(function(resolve, reject) {

                            $.ajax({
                                url: `https://api.postcodes.io/postcodes/${$post_code}/validate`,
                                type: 'get',
                                success: function(data) {
                                    if (data.status === 200) {
                                        resolve(data.result);
                                    } else {
                                        reject('post code is not valid');
                                    }
                                },
                                error: function() {
                                    reject('error with ajax function');
                                }
                            });


                        });

                    validatePostcode.then(function(val) {
                        console.log(val);
                        postCodeStatus = val;

                        if (!phone_real || !$address1 || !$address2 || !$city_town || !$country) {
                            $('.save-ship-details').notify('One or more fields are invalid or empty.', 'warn');

                            if (!phone_real) {
                                $('#validationNumber').notify('Invalid phone number entered', 'error');
                                return;
                            }

                            return;
                        }
                        // address1, address2, city_town, post_code, country, phone_num
                        let final_address = new PaymentAddress($address1, $address2, $city_town, $post_code, $country, $phone_num),
                            locationURL = '/checkout/guest',
                            inhour = new Date(new Date().getTime() + 60 * 60 * 1000);;

                        console.log(final_address);

                        // send the address to be saved in session variable
                        $.ajax({
                            url: '/scripts/guestcheckoutsession.php',
                            type: 'post',
                            data: {
                                type: targetType,
                                shipping_details: final_address,
                                basket_data: localStorage.getItem('basket')
                            },
                            success: function(data) {
                                let $data = JSON.parse(data);

                                console.log($data);
                                switch ($data.status.code) {
                                    case (101 || '101'):
                                        if ($data.data.session.length < 3) {
                                            $.notify('please resave both detail sections', 'warn');
                                        } else {
                                            // console.log('REDIRECT to /checkout/guest');
                                            Cookies.set('trans_local_token', 'user-checkout', {
                                                expires: inhour
                                            });

                                            localStorage.setItem('checkout-cookie-location', locationURL);

                                            setTimeout(function() {
                                                console.log(Cookies.get('trans_local_token'));
                                                window.location = '/checkout/guest';
                                            }, 200)
                                        }

                                        break;
                                    case (404 || '404'):
                                        $.notify($data.data.msg, $data.status.code_status);

                                        break;
                                    default:

                                }
                            },
                            error: function() {

                            }
                        })

                    }).catch((reason) => {
                        $('#validationPostcode').notify(reason, 'error');
                        // console.log(reason);
                        postCodeStatus = false;
                    });



                },
                phonenumber: function(inputtxt) {
                    let phoneno = /^\d{11}$/;
                    if (inputtxt.match(phoneno)) {
                        return true;
                    } else {
                        return false;
                    }
                },
                payment: function(e) {
                    // get the total of the basket
                    let orderTotal = $(e.target).attr('data-total'),
                        userEmail = $(e.target).attr('data-customer');

                    // send over customer email and other info here

                    // console.log(basketTotal * 100);
                    handler.open({
                        name: 'idyl',
                        description: 'Multiple Purchases',
                        amount: orderTotal,
                        currency: 'gbp',
                        zipCode: true,
                        billingAddress: true,
                        email: userEmail

                    });
                },
                setPaymentCookie: function(e) {
                    let targetEl = $(e.target)[0],
                        locationURL = targetEl.attributes['data-href'].value,
                        inhour = new Date(new Date().getTime() + 60 * 60 * 1000);

                    Cookies.set('trans_local_token', 'user-checkout', {
                        expires: inhour,
                        path: locationURL
                    });
                    localStorage.setItem('checkout-cookie-location', locationURL);

                    setTimeout(function() {
                        window.location = locationURL;
                    }, 200);

                },
                directGuest: function(e) {
                    let targetEl = $(e.target)[0],
                        locationURL = targetEl.attributes['data-href'].value;

                    setTimeout(function() {
                        window.location = locationURL;
                    }, 200);
                },
                renderStoryContent: function() {
                    let id = '8f003a39e5',
                        table = 'pages',
                        type = 'retrieve',
                        field = 'page_id';

                    let content = new getPageContent(type, table, field, id),
                        element = ['.story-content'];

                    content.markdown(element, 'page_markdown');

                },
                toggleFilter: function(e) {
                    // console.log('filter toggled');
                    this.filterStatus = !this.filterStatus;
                },
                toggleProducts: function(e) {
                    console.log('category checkbox clicked');
                    let targetCheckbox = $(e.target);

                    console.log(targetCheckbox);
                    console.log(targetCheckbox[0].checked);
                    if (targetCheckbox[0].checked) {
                        console.log('cat checkbox for ' + targetCheckbox[0].attributes['data-category'].nodeValue + ' has been checked');
                        switch (targetCheckbox[0].attributes[1].nodeValue) {
                            case 'livingroom':
                                window.location = '/products/livingroom'
                                break;
                            case 'kitchen':
                                window.location = '/products/kitchen'
                                break;
                            case 'bedroom':
                                window.location = '/products/bedroom'
                                break;
                            case 'bath':
                                window.location = '/products/bath'
                                break;
                            default:
                                window.location = '/products/'+targetCheckbox[0].attributes['data-category'].nodeValue;
                            break;
                        }
                    } else {
                        window.location = "/products"
                    }

                },
                toggleBrand: function(e){
                    let targetCheckbox = $(e.target);

                    console.log(targetCheckbox);
                    console.log(targetCheckbox[0].checked);
                    if (targetCheckbox[0].checked) {
                        console.log('cat checkbox for ' + targetCheckbox[0].attributes['data-brand-name'].nodeValue + ' has been checked');
                        let brand = targetCheckbox[0].attributes['data-brand-name'].nodeValue;

                        // console.log('TARGET LOCATION: /products/brand/'+brand);
                        window.location = '/products/brands/'+brand;
                    }else {
                        window.location = '/products/';
                    }
                },
                addToWishlist: function() {
                    $nav_vue.addToWishlist();
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

                    let $vm = this;
                    setTimeout(function() {

                        $vm.basket.items = $nav_vue.basket.items;
                        console.log('GET BASKET HOME VUE TIMEOUT RUN');

                        if ($vm.basket.items.length < 1) {
                            console.log('FALSE');
                            $vm.basketHasItems = false;
                            $('.basket-home').addClass('empty-basket');

                            if ($('.loader-screen').hasClass('visible')) {
                                $('.loader-screen').css({
                                    'display': 'none'
                                });
                                if (!$vm.basketHasItems) {
                                    $('.basket-alert').fadeIn();
                                }
                            }
                        } else {
                            console.log('TRUE');
                            $vm.basketHasItems = true;
                            $('.basket-home').removeClass('empty-basket');
                        }
                    }, 2100)


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

                    productInfo.price = productInfo.price / 100;

                    // create a new basketItem
                    let item = new BasketItem(productInfo.product, productInfo.id, productInfo.prod_name, productInfo.attributes.size, productInfo.attributes.color, productInfo.prod_slug, productInfo.prod_desc, productInfo.price, productInfo.image, this.prodQuantity, productInfo.attributes.category, productInfo.attributes.type),
                        $vm = this;

                    console.log(item);
                    //
                    // // check if basket exist in local Storage
                    $nav_vue.checkBasketSession();

                    setTimeout(function() {
                        let exists = $vm.checkItemExists($nav_vue.basket.items, item);
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

                            // update database with latest basket info
                            if ($nav_vue.loggedInStatus) {
                                $nav_vue.updateBasketDB($nav_vue.basket.items);
                            }


                            shakeShoppingIcon();
                        } else {
                            // update basket with new item
                            $nav_vue.basketCount += 1;
                            $nav_vue.basket.items.push(item);
                            $nav_vue.basketTotal += (item.price * item.quantity);

                            localStorage.setItem('basket', JSON.stringify($nav_vue.basket.items));

                            // update database with latest basket info if LOGGED IN
                            if ($nav_vue.loggedInStatus) {
                                $nav_vue.updateBasketDB($nav_vue.basket.items);
                            }


                            shakeShoppingIcon();
                        }
                    }, 1300)


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
                },
                toggleSign: function(e) {
                    let targetElement = $(e.target)[0];

                    console.log(targetElement);
                    console.log(targetElement.tagName);

                    if (targetElement.tagName === 'SPAN' || targetElement.tagName === "DIV") {
                        let spanIcon = $(targetElement).siblings();

                        if ($(spanIcon[0]).hasClass('fa')) {
                            if ($(spanIcon).hasClass('open-accordion')) {
                                console.log('if-- has open accordion');
                                $(spanIcon).removeClass('open-accordion fa-minus').addClass('closed-accordion fa-plus');
                            } else if ($(spanIcon).hasClass('closed-accordion')) {
                                console.log('if-- has closed-accordion');
                                $(spanIcon).removeClass('closed-accordion fa-plus').addClass('open-accordion fa-minus');
                            }
                        } else {
                            if ($(spanIcon.prevObject[0]).hasClass('open-accordion')) {
                                console.log('elseif-- has open accordion');
                                $(spanIcon.prevObject[0]).removeClass('open-accordion fa-minus').addClass('closed-accordion fa-plus');
                            } else if ($(spanIcon.prevObject[0]).hasClass('closed-accordion')) {
                                console.log('elseif--  has closed-accordion');
                                $(spanIcon.prevObject[0]).removeClass('closed-accordion fa-plus').addClass('open-accordion fa-minus');
                            }

                        }

                    }

                }
            },
            computed: {

            },
            watch: {
                filterStatus: function(value) {
                    if (value) {
                        if ($('.filter-mobile').hasClass('closed-filter')) {
                            $('.filter-mobile').removeClass('closed-filter').addClass('open-filter');
                        }

                    } else {
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

                },
                basketHasItems: function(value) {
                    if (!value) {

                    }
                }
            },
            created: function() {

            },
            mounted: function() {
                let $vm = this;

                this.getCategoryData();

                // render slides dynamically
                let initslide = new Promise(function(resolve, reject) {

                    $vm.getSlideData();
                    if (true) {
                        resolve(true);
                    }
                });

                initslide.then(function(val){

                    // intialize the slick slideshow
                    console.log('then run. slide show init');
                    setTimeout(function(){
                        $('.home-slide').slick({
                            lazyLoad: 'ondemand',
                            autoplay: true,
                            autoplaySpeed: 3000,
                            arrows: false,
                            appendDots: $('.home-slide'),
                            dots: true
                        })
                    }, 1700);

                })




                $('.pr-info-link').on('click', function(e) {
                    console.log($(e.target));
                    let targetElement = $(e.target)[0];
                    if (targetElement.tagName === 'SPAN' || targetElement.tagName === "BUTTON") {
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

                // click event for shipping choice radio buttons

                $('.rate-radio').on('click', function(e) {
                    let targetElement = $(e.target)[0],
                        allRateRadios = $('#shipping-method-radios').find('.rate-radio'),
                        targetRate = $(targetElement).attr('data-rate-id'),
                        orderID = $(targetElement).attr('data-order-id'),
                        $carrier = $(targetElement).attr('data-carrier'),
                        carrierService = $(targetElement).attr('data-carrier-service');

                    // console.log(targetElement);
                    // console.log(allRateRadios);

                    for (var i = 0; i < allRateRadios.length; i++) {
                        if (allRateRadios[i].checked) {
                            allRateRadios[i].checked = false;
                        }
                    }

                    targetElement.checked = true;
                    console.log(targetRate);
                    console.log(orderID);

                    //send ajax to update selected order shipping method
                    $.ajax({
                        url: '/scripts/order_functions.php',
                        type: 'post',
                        data: {
                            rate: targetRate,
                            order: orderID,
                            carrier: $carrier,
                            service: carrierService
                        },
                        success: function(data) {
                            let $data = JSON.parse(data),
                                newAmount = ($data.data.new_amount / 100).toFixed(2);

                            // update span total with new order amount
                            $('#total-order-price').html(newAmount);
                            $('.payOrder').attr('data-total', $data.data.new_amount);

                        },
                        error: function() {
                            console.log('error with ajax request');
                        }
                    })

                })

                // only get featured products if user is on home page or individual product page

                if (window.location.pathname === '/' || window.location.pathname.split('/')[1] === 'product') {
                    // this.getFeaturedProducts();
                }

                if (window.location.pathname.split('/')[1] === 'our-story') {
                    this.renderStoryContent();
                }

                if (window.location.pathname.split('/')[1] === 'checkout') {
                    console.log('chcekout');
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                }


                this.getBasketInfo();
                // $('.lazy').Lazy({
                //     delay: 5000
                // });


                // this.ajaxFunctions();
            },

        })

        $home_vue.$watch('basket.items', function(newVal, oldVal) {
            if (newVal.length < 1) {
                $home_vue.basketHasItems = false;
                $('.loader-screen').css({
                    'display': 'none'
                });
                $home_vue.basketTotal = 0;
            } else if (newVal.length > oldVal.length) {
                //add to the total price when item is added to basket
                for (var i = 0; i < newVal.length; i++) {
                    $home_vue.basketTotal += (newVal[i].price * newVal[i].quantity);
                }

            }


            console.log("BASKET ITEMS CHANGED HOME VUE");
            $home_vue.basketTotal = 0;
            for (var i = 0; i < newVal.length; i++) {
                $home_vue.basketTotal += (newVal[i].price * newVal[i].quantity);
            }

        })
    } else {
        console.log('home hidden');
    }

                    $(".lazy").Lazy({
            beforeLoad: function(element) {
                // called before an elements gets handled
                console.log('before load');
            },
            afterLoad: function(element) {
                // called after an element was successfully handled
                console.log('after load');
            },
            onError: function(element) {
                // called whenever an element could not be handled
            },
            onFinishedAll: function() {
                // called once all elements was handled
                console.log('ALL LOADED');
            }
        });


    function renderShippingContent() {
        let id = '97cc350c5e',
            table = 'pages',
            type = 'retrieve',
            field = 'page_id';

        let content = new getPageContent(type, table, field, id),
            element = ['#ship-content1', '#ship-content2', '#ship-content3', '#ship-content4', '#ship-content5'];

        content.markdown(element, 'page_markdown');

    }

    function renderReturnContent() {
        let id = 'ed8c8f347e',
            table = 'pages',
            type = 'retrieve',
            field = 'page_id';

        let content = new getPageContent(type, table, field, id),
            element = ['#return-content1', '#return-content2', '#return-content3', '#return-content4'];

        content.markdown(element, 'page_markdown');

    }

    function renderPaymentContent() {
        let id = '5d4b314e6d',
            table = 'pages',
            type = 'retrieve',
            field = 'page_id';

        let content = new getPageContent(type, table, field, id),
            element = ['#payment-content1', '#payment-content2', '#payment-content3', '#payment-content4'];

        content.markdown(element, 'page_markdown');

    }

    function renderOrderContent() {
        let id = '649b879831',
            table = 'pages',
            type = 'retrieve',
            field = 'page_id';

        let content = new getPageContent(type, table, field, id),
            element = ['#order-content1', '#order-content2', '#order-content3', '#order-content4'];

        content.markdown(element, 'page_markdown');

    }

    function renderTermscondContent() {
        let id = 'e7b6d56e22',
            table = 'pages',
            type = 'retrieve',
            field = 'page_id';

        let content = new getPageContent(type, table, field, id),
            element = ['#termscondition-content'];

        content.markdown(element, 'page_markdown');

    }

    function renderPrivacypolContent() {
        let id = 'b77bf5106e',
            table = 'pages',
            type = 'retrieve',
            field = 'page_id';

        let content = new getPageContent(type, table, field, id),
            element = ['#privacypol-content'];

        content.markdown(element, 'page_markdown');

    }


    if (window.location.pathname.split('/')[2] === 'shipping') {
        console.log('SHIPPING CONTENT RENDERED');
        renderShippingContent();
    }

    if (window.location.pathname.split('/')[2] === 'returns') {
        console.log('RETURNS CONTENT RENDERED');
        renderReturnContent();
    }

    if (window.location.pathname.split('/')[2] === 'payments') {
        console.log('PAYMENT CONTENT RENDERED');
        renderPaymentContent();
    }

    if (window.location.pathname.split('/')[2] === 'orders') {
        console.log('ORDER CONTENT RENDERED');
        renderOrderContent();
    }

    if (window.location.pathname.split('/')[1] === 'termsconditions') {
        console.log('TERMS AND CONDITIONS CONTENT RENDERED');
        renderTermscondContent();
    }

    if (window.location.pathname.split('/')[1] === 'privacy-policy') {
        console.log('PRIVACY POLICY CONTENT RENDERED');
        renderPrivacypolContent();
    }



    // plain html template js that updates vue instances
    $('#footer-search').on('click', function() {
        console.log('footer search clicked');
        $nav_vue.searchToggle();
    })

})
