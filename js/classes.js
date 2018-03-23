(function() {
    'use strict';
    // this function is strict...
}());

class NavigationLink {
    constructor(link_id, title) {
        this.link_id = link_id;
        this.address = '';
        this.title = title;
        this.showlink = false;
        this.cta_boxes = this.createBoxes(3);
        this.slug = this.createSlug();
        this.submenu = false;
        this.submenu_categories = [];
    }

    createBoxes(val){
        let boxes = [];

        for (var i = 0; i < val; i++) {
            let menuctabox = new MenuctaBoxes('MB'+i, 'default', '/', '/assets/main/dust_scratches.png');

            boxes.push(menuctabox);
        }

        return boxes;
    }

    createSlug(){
        let splitToLower = this.title.split(' ');

        for (let i = 0; i < splitToLower.length; i++) {
            splitToLower[i] = splitToLower[i].replace('&', 'and').replace(/[^\w\s]/gi, '').toLowerCase();
        }

        this.address = '/'+splitToLower.join('-');

        return splitToLower.join('-');
    }

    logStuff(){
        console.log('i work now and forever');
    }
}

// // NOTE: WHEN RENDERING THE NAV IN DASHBOARD INSTANTIATE A NEW NAVLINK CLASS AND FILL IT WITH PARSED DATA FROM DATABASE


class MenuCategories {
    constructor(title) {
        this.title = title;
        this.slug = this.createSlug();
        this.cat = this.createCat();
    }

    createSlug(){
        let splitToLower = this.title.split(' ');

        for (let i = 0; i < splitToLower.length; i++) {
            splitToLower[i] = splitToLower[i].replace('&', 'and').replace(/[^\w\s]/gi, '').toLowerCase();
        }

        return splitToLower.join('-');
    }

    createCat(){
        let splitToLower = this.title.split(' ');

        for (let i = 0; i < splitToLower.length; i++) {
            splitToLower[i] = splitToLower[i].replace('&', 'and').replace(/[^\w\s]/gi, '').toLowerCase();
        }

        return splitToLower.join('');
    }

    lograndom(){
        console.log('i am a function attached to the object: '+this.title);
    }
}

class MenuctaBoxes {
    constructor(id, title, link, image) {
        this.id = id;
        this.title = title;
        this.message = '',
        this.link = link;
        this.image = image;
    }
}

let test_navlink = new NavigationLink('about-1', 'about us');


class Brand {
    constructor(brand_id, brand_letter) {
        this.brand_id = brand_id;
        this.brand_letter = brand_letter;
        this.brand_array = [];
    }
}

class Brand_details {
    constructor(brand_name) {
        this.brand_name = brand_name;
        this.brand_slug = '';
    }

    createSlug(){
        let splitToLower = this.brand_name.split(' ');

        for (let i = 0; i < splitToLower.length; i++) {
            splitToLower[i] = splitToLower[i].replace('&', 'and').replace(/[^\w\s]/gi, '').toLowerCase();
        }
        this.brand_slug = splitToLower.join('-');
        return this.brand_slug;
    }
}


class BlogPost {
    constructor(cat_id, main_img, post_title, post_brief, post_body, post_status, date_created, date_modified, date_published) {
        this.cat_id = cat_id;
        this.main_img = main_img;
        this.post_title = post_title;
        this.post_brief = post_brief;
        this.post_body = post_body;
        this.post_status = post_status;
        this.date_created = date_created;
        this.date_modified = date_modified;
        this.date_published = date_published;
    }

}



class BasketItem {
    constructor(product_id, stripesku_id, prod_name, prod_size, prod_color, name_slug, prod_desc, price, prod_image, quantity, category, prod_type) {
        this.product_id = product_id;
        this.stripesku_id = stripesku_id;
        this.prod_name = prod_name;
        this.name_slug = name_slug;
        this.prod_tags = {
            size: prod_size,
            color: prod_color
        };
        this.prod_desc = prod_desc;
        this.price = price;
        this.prod_image = prod_image;
        this.quantity = quantity;
        this.category = category;
        this.prod_type = prod_type;
        this.total_price = this.calculateTotal();
    }
    //getters - written as foo.totalPrice //NOTE doesn't have to be written as foo.totalPrice()
    get totalPrice(){
        return this.total_price;
    }

    //methods
    calculateTotal(){
        return (this.price * this.quantity);
    }
}

class User {
    constructor(title, fname, lname, dob, email, password) {
        this.title = title;
        this.fname = fname;
        this.lname = lname;
        this.dob = dob;
        this.email = email;
        this.password = password;
    }
}

class UpdateUserDetails {
    constructor(id, stripe_cus_id, title, fname, lname, dob) {
        this.id = id;
        this.stripe_cus_id = stripe_cus_id;
        this.title = title;
        this.fname = fname;
        this.lname = lname;
        this.dob = dob;
    }
}

class UpdateLoginDetails {
    constructor(id, stripe_cus_id, email, email_confirm, password, password_confirm) {
        this.id = id;
        this.stripe_cus_id = stripe_cus_id;
        this.email = email;
        this.email_confirm = email_confirm;
        this.password = password;
        this.password_confirm = password_confirm;

    }
}

class LoginUser {
    constructor(email, password, rememberMe) {
        this.email = email;
        this.password = password;
        this.rememberMe = rememberMe;
    }
}

class Address {
    constructor(title, fname, lname, phone, address1, address2, address3, city_town, post_code, country, status) {
        this.title = title;
        this.fname = fname;
        this.lname = lname;
        this.phone = phone;
        this.address1 = address1;
        this.address2 = address2;
        this.address3 = address3;
        this.city_town = city_town;
        this.post_code = post_code;
        this.country = country;
        this.status = status;
    }
}

class PaymentAddress {
    constructor(address1, address2, city_town, post_code, country, phone_num) {
        this.address1 = address1;
        this.address2 = address2;
        this.city_town = city_town;
        this.post_code = post_code;
        this.country = country;
        this.phone_num = phone_num;
    }
}

class getPageContent {
    constructor(type, tbl, field, val) {
        this.type = type;
        this.tbl = tbl;
        this.field = field;
        this.val = val,
        this.editor = '';
    }

    populateEditor(markdown, pageEditor){
        let editor = pageEditor,
            $markdown = markdown;

        console.log('---------');
        console.log('populateEditor');
        // console.log($markdown);
        console.log(typeof $markdown);
        try {
            $markdown = JSON.parse($markdown);

            for (var i = 0; i < editor.length; i++) {
                editor[i].value($markdown[i]);
            }
        } catch (e) {
            // if error parsing it means that we are rendering blog post content
            let error = 'markdown hasnt been stringifyied';
            $markdown = $markdown;

            for (var i = 0; i < editor.length; i++) {
                editor[i].value($markdown);
            }
        }

    }

    markdown(el, getField){
        // el is for element
        // mulitple is an array

        let $type = this.type,
            $tbl = this.tbl,
            $field = this.field,
            $val = this.val,
            $editor = this.editor,
            $this = this;

        $.ajax({
            url: '/backend/scripts/content-controls.php',
            type: 'post',
            data: {
                type: $type,
                table: $tbl,
                field: $field,
                id: $val,
                get_field: getField
            },
            success: function(data){
                let $data = JSON.parse(data);

                console.log($data);
                // only populate editor if user is on edit page
                if (window.location.pathname.split('/')[4] === 'edit') {
                    if (window.location.pathname.split('/')[5] === 'blogpost') {
                        $this.populateEditor($data.data.markdown.blog_body, $editor);
                        console.log($data.data.markdown.blog_body);
                        return;
                    }else {
                        $this.populateEditor($data.data.markdown.page_markdown, $editor);
                        return;
                    }

                }else {
                    // render content on customer facing pages parsing markdown
                    if (el.length < 2) {
                        $this.singleContent(el[0], $data.data.markdown.page_markdown);
                        return;
                    }else {
                        $this.mulitpleContent(el, $data.data.markdown.page_markdown);
                    }

                }

            }
        })
    }

    singleContent(element, markdown){
        let $el = $(`${element}`),
            $markdown = markdown,
            content_html = '';

        console.log($markdown);
        // parse the markdown
        $markdown = JSON.parse($markdown);

        // turn to html
        content_html = marked($markdown[0]);

        // render html parsed markdown in element
        $el.prepend(content_html);
    }

    mulitpleContent(element, markdown){
        let $el = element,
            $markdown = markdown,
            content_html = '';

        console.log($el);
        // parse the markdown
        $markdown = JSON.parse($markdown);
        console.log($markdown);
        //
        for (var i = 0; i < $el.length; i++) {
            // turn to html
            content_html = marked($markdown[i]);
            // render html parsed markdown in element
            $($el[i]).prepend(content_html);
        }
    }

    configEditorVar(val){
        return this.editor = val;
    }


}

$(document).ready(function(){
    console.log('connected but separate from main.js');
    console.log(window.location.pathname);

    var _originalSize = $(window).width() + $(window).height();

    if (window.location.pathname === '/login') {
        $(window).resize(function(){
          if($(window).width() + $(window).height() != _originalSize){
            console.log("keyboard show up");
            $('footer').css("visibility", "hidden");
          }else{
            console.log("keyboard closed");
             $('footer').css("visibility", "visible");
          }
        });
    }


    // if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    //
    // }


})
