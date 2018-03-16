(function() {
    'use strict';
    // this function is strict...
}());

$(document).ready(function() {

    console.log('settings is connected');
// background-position: center; background-size: cover

    let $dashboard_vue = new Vue({
        el: '.dash-vue',
        data:{
            status: 'dashboard vue connected',
            navigation: {
                pages: [
                    {
                        title: 'Home Slide Content',
                        link: "/backend/auth/admin/edit/homepage-edit/e9be46f22c",
                        sublinks: false
                    },
                    {
                        title: 'Our Story Content',
                        link: "/backend/auth/admin/edit/ourstory-edit/8f003a39e5",
                        sublinks: false
                    },
                    {
                        title: 'Brands',
                        sublinks: true,
                        sublinks_list:[
                            {
                                title: 'Add Brands',
                                link: "/backend/auth/admin/edit/brands/add"
                            },
                            {
                                title: 'View/Delete blog brands',
                                link: "/backend/auth/admin/edit/brands/edit"
                            }
                        ]
                    },
                    {
                        title: 'Blog Images',
                        sublinks: true,
                        sublinks_list:[
                            {
                                title: 'Add Blog images',
                                link: "/backend/auth/admin/edit/add-blog-images"
                            },
                            {
                                title: 'View/Delete blog images',
                                link: "/backend/auth/admin/edit/view-blog-images"
                            }
                        ]
                    },
                    {
                        title: 'Create Blog Posts',
                        link: "/backend/auth/admin/edit/create-blog-posts",
                        sublinks: false
                    },
                    {
                        title: 'Edit Blog Posts',
                        link: "/backend/auth/admin/edit/all-blog-posts",
                        sublinks: false
                    },
                    {
                        title: 'Upload Product Images',
                        link: "/backend/auth/admin/edit/upload-product-images",
                        sublinks: false
                    },
                    {
                        title: "Edit Product Images",
                        sublinks: true,
                        sublinks_list: [
                            {
                                title: "Livingroom Products",
                                link: "/backend/auth/admin/edit/products/livingroom"
                            },
                            {
                                title: 'Kitchen Products',
                                link: "/backend/auth/admin/edit/products/kitchen"
                            },
                            {
                                title: 'Bedroom Products',
                                link: "/backend/auth/admin/edit/products/bedroom"
                            },
                            {
                                title: 'Bath Products',
                                link: "/backend/auth/admin/edit/products/bath"
                            }
                        ]
                    },
                    {
                        title: "Help",
                        sublinks: true,
                        sublinks_list: [
                            {
                                title: "Shipping",
                                link: "/backend/auth/admin/edit/shipping-edit/97cc350c5e"
                            },
                            {
                                title: 'Returns',
                                link: "/backend/auth/admin/edit/return-edit/ed8c8f347e"
                            },
                            {
                                title: 'Payments',
                                link: "/backend/auth/admin/edit/payment-edit/5d4b314e6d"
                            },
                            {
                                title: 'Orders',
                                link: "/backend/auth/admin/edit/order-edit/649b879831"
                            },
                            {
                                title: 'Terms & Conditions',
                                link: "/backend/auth/admin/edit/termsconditions-edit/e7b6d56e22"
                            },
                            {
                                title: 'Privacy Policy',
                                link: "/backend/auth/admin/edit/privacypolicy-edit/b77bf5106e"
                            }
                        ]
                    }
                ]
            },
            counter:{
                progressCounter: 0,
                uploadtempCounter: 0,
                uploadCounter: 0,
                singleCounter:{
                    limit: 1,
                    counterTemp: 0,
                    counter: 0
                }
            },
            upload:{
                limit: 4,
                files:{
                    sku_parent: '',
                    category: 'not-in-use',
                    images: []
                },
                validSKU: false
            },
            showUpload: false,
            singleUploadStatus: false,
            slideshowUpload: {
                counter: {
                    counterTemp: 0,
                    uploadCounter: 0
                },
                upload:{
                    limit: 1,
                    allImages: '',
                    oldimage_address: '',
                    newimage_address: ''
                }
            },
            blogimagesUpload: {
                limit: 10,
                counter:{
                    counterTemp: 0,
                    uploadCounter: 0,
                    progressCounter: 0
                }
            },
            selectedImage:{
                images: [],
                position: '',
                oldimage_address: '',
                newimage_address: ''
            },
            deleteImageModalTriggers: {
                yes: false,
                no: false
            },
            dashboardhome:{
                panels:[
                    {
                        id: 'home',
                        title: 'Edit Home slideshow content',
                        multiple_links: false,
                        link: '/backend/auth/admin/edit/homepage-edit/e9be46f22c'
                    },
                    {
                        id: 'our-story',
                        title: 'Edit Our Story page content',
                        multiple_links: false,
                        link: '/backend/auth/admin/edit/ourstory-edit/8f003a39e5'
                    },
                    {
                        id: 'upload-images',
                        title: 'Upload product images',
                        multiple_links: false,
                        link: '/backend/auth/admin/edit/upload-product-images'
                    },
                    {
                        id: 'edit-change-images',
                        title: 'Change product images',
                        multiple_links: true,
                        className: 'panel-success',
                        link: [
                            {
                                category: 'Livingroom',
                                link: '/backend/auth/admin/edit/products/livingroom'
                            },
                            {
                                category: 'Bedroom',
                                link: '/backend/auth/admin/edit/products/bedroom'
                            },
                            {
                                category: 'Bath',
                                link: '/backend/auth/admin/edit/products/bath'
                            },
                            {
                                category: 'Kitchen',
                                link: '/backend/auth/admin/edit/products/kitchen'
                            }
                        ]
                    },
                    {
                        id: 'help',
                        title: 'Edit Help page content',
                        multiple_links: true,
                        className: 'panel-info',
                        link: [
                            {
                                category: 'Shipping',
                                link: '/backend/auth/admin/edit/shipping-edit/97cc350c5e'
                            },
                            {
                                category: 'Returns',
                                link: '/backend/auth/admin/edit/return-edit/ed8c8f347e'
                            },
                            {
                                category: 'Payments',
                                link: '/backend/auth/admin/edit/payment-edit/5d4b314e6d'
                            },
                            {
                                category: 'Orders',
                                link: '/backend/auth/admin/edit/order-edit/649b879831'
                            },
                            {
                                category: 'Terms & Conditions',
                                link: '/backend/auth/admin/edit/termsconditions-edit/e7b6d56e22'
                            },
                            {
                                category: 'Privacy Policy',
                                link: '/backend/auth/admin/edit/privacypolicy-edit/b77bf5106e'
                            }
                        ]
                    }
                ]
            },
            addBrands:{
                status: false
            }
        },
        watch: {
            singleUploadStatus: function(value){
                let $vm = this;
                if(value){
                    $('.browse2').removeClass('disabled');
                }else {
                    $('.browse2').addClass('disabled');
                    if ($vm.counter.singleCounter.counter > 0) {
                        return;
                    }else {
                        $('.save-image-change').addClass('disabled');
                    }

                }
            }

        },
        computed: {

        },
        methods: {
            checkLength: function(e){
                let field = $(e.target)[0],
                    textLength = $(e.target)[0].value.length,
                    $vm = this;

                if (textLength > 1 || textLength < 1) {
                    $('.alert-field-limit').fadeIn();
                    $vm.addBrands.status = false;
                }

                if (textLength === 1) {
                    $('.alert-field-limit').fadeOut();
                    $vm.addBrands.status = true;
                }
            },
            saveBrandInfo: function(e){
                let brandLetter = $('.brand-initial-inp')[0].value,
                    brandNames = $('.brand-names-inp')[0].value,
                    $vm = this;

                if ($vm.addBrands.status && brandNames.length > 1) {
                    console.log('process values');

                    // process brandNames
                    let b_names = brandNames.split(','),
                        lettercharCode = (brandLetter.toLowerCase().charCodeAt(0))-96;

                    console.log(b_names);
                    console.log(lettercharCode);

                }else {
                    $.notify('Cant add brands as fields are filled in incorrectly', 'error');
                }

            },
            triggerDelete: function(e){
                let button = $(e.target)[0],
                    val = $(button).attr('data-action'),
                    image_name = $('#deletemodal').attr('data-image-name'),
                    image_path = $('#deletemodal').attr('data-image-path'),
                    imageID = $('#deletemodal').attr('data-img-id');

                switch (val) {
                    case 'yes':
                        // send ajax request to delete image
                        console.log('send ajax to delete image');
                        console.log(image_name);
                        console.log(image_path);
                        console.log(imageID);

                        $.ajax({
                            url: '/backend/scripts/delete_blog_image.php',
                            type: 'post',
                            data: {
                                img_name: image_name,
                                imgID: imageID,
                                path: image_path
                            },
                            success: function(data){
                                console.log(data);
                                let $data = JSON.parse(data);

                                console.log($data);
                                switch ($data.status.code) {
                                    case (101 || '101'):
                                        // close modal
                                        $('#deletemodal').modal('hide');

                                        // reset attributes
                                        $('#deletemodal').attr('data-image-name', '');
                                        $('#deletemodal').attr('data-image-path', '');
                                        $('#deletemodal').attr('data-img-id', '');

                                        setTimeout(function(){
                                            window.location.reload();
                                        }, 1500);

                                        break;
                                    case (404 || '404'):

                                        $('.alert-delete-error').fadeIn();
                                        $('#alert-delete-error-msg').html($data.data.msg);

                                        break;
                                    default:

                                }
                            },
                            error: function(){

                            }
                        })



                        // page refresh
                        break;
                    case 'no':
                        console.log('close modal');

                        // close modal
                        $('#deletemodal').modal('hide');

                        // reset attributes
                        $('#deletemodal').attr('data-image-name', '');
                        $('#deletemodal').attr('data-image-path', '');
                        $('#deletemodal').attr('data-img-id', '');
                        break;
                    default:

                }

            },
            deleteImage: function(e){
                let button = $(e.target)[0],
                    image_path = $(button).attr('data-image-path'),
                    image_name = $(button).attr('data-image-name'),
                    imageID = $(button).attr('data-img-id');

                // trigger modal and get response
                $('#deletemodal').modal('show');

                // add data to modal attributes
                $('#deletemodal').attr('data-image-name', image_name);
                $('#deletemodal').attr('data-image-path', image_path);
                $('#deletemodal').attr('data-img-id', imageID);

            },
            viewImage: function(e){
                let button = $(e.target)[0],
                    image_path = $(button).attr('data-image-path'),
                    image_name = $(button).attr('data-image-name'),
                    name_split = image_name.split('.');

                console.log(image_path);
                console.log(image_name);

                window.open('/blogimage/'+name_split[0]+'/'+name_split[1], '_blank');

            },
            dashhome: function(){
                window.location = '/';
            },
            blogUploadBox: function(){
                let $vm = this,
                    file = $('#blogUpload');

                if ($vm.blogimagesUpload.counter.counterTemp === $vm.blogimagesUpload.limit) {
                    return;
                }else {
                    file.trigger('click');
                }

            },
            resetUploadValues: function(){
                let $vm = this,
                    alertMsg = confirm('this will clear all uploads. Are you sure you want to continue?');

                if (alertMsg) {
                    // reset all upload values
                    $vm.blogimagesUpload.counter.counterTemp = 0;
                    $vm.blogimagesUpload.counter.uploadCounter = 0;
                    $vm.blogimagesUpload.counter.progressCounter = 0;

                    // clear pending-uploads container
                    $('.pending-uploads').html('');

                    // remove error/warning messages
                    $('.alert-limit').fadeOut();
                    $('.alert-file-error').fadeOut();

                }else {
                    return;
                }

            },
            saveImageChange: function(){
                let $vm = this;
                if ($vm.singleUploadStatus && $vm.counter.singleCounter.counter > 0) {
                    console.log('saved');

                    /*
                        - add new returned address to images array replacing the selected image
                        - get sku_id of product being edited
                        - get category
                        - get position of element to change
                    */

                    let $vm = this,
                        imagesArr = $vm.selectedImage.images,
                        pos = $vm.selectedImage.position,
                        replace_image_addr = $vm.selectedImage.oldimage_address,
                        new_image_addr = $vm.selectedImage.newimage_address,
                        sku_id = $('#imageEditModal').attr('data-sku'),
                        sku_cat = $('#imageEditModal').attr('data-cat');

                    imagesArr[pos-1] = new_image_addr;

                    // add new data to database via ajax
                    /*
                        - send old image address
                        - send new updated image array
                        - send category
                    */

                    $.ajax({
                        url: '/backend/scripts/update_sku_images.php',
                        type: 'post',
                        data:{
                            imgs: JSON.stringify(imagesArr),
                            delete_img: replace_image_addr,
                            skuID: sku_id,
                            skuCAT: sku_cat,
                            position: pos,
                            newImage: new_image_addr
                        },
                        success: function(data){
                            console.log(data);
                            let $data = JSON.parse(data);

                            switch ($data.status.code) {
                                case (101 || '101'):
                                    let button_trigger_id = $('#imageEditModal').attr('data-button-trigger'),
                                        buttonIndex = $('#imageEditModal').attr('data-button-index');

                                    // change the image data on button that triggered modal
                                    $(button_trigger_id).attr('data-images', $data.data.images_arr);

                                    // hide modal if successful
                                    $('#imageEditModal').modal('hide');

                                    // show success message for successful sku update
                                    $('.alert-sku-update-'+buttonIndex).fadeIn();
                                    $('#alert-sku-update-msg-'+buttonIndex).html($data.data.msg);

                                    // change the main image
                                    if (pos === '1' || pos === 1){
                                        $('.panelimage-'+buttonIndex).css({'background':'url('+$data.data.new_image+')', "background-position":"center", 'background-size':'cover'});
                                    }

                                    break;
                                case (404 || '404'):

                                    $('.alert-save-error').fadeIn();
                                    $('#alert-save-error-msg').html($data.data.msg);

                                    setTimeout(function(){
                                        $('.alert-save-error').fadeOut();
                                    }, 10500);
                                    break;
                                default:

                            }

                        },
                        error: function(){
                            $.notify('error sending save request. Try again', 'error');
                        }
                    })

                }else {
                    if (!$vm.singleUploadStatus) {
                        $.notify('please select an image that you want changed before saving', 'warn');
                    }

                    if ($vm.counter.singleCounter.counter <= 0) {
                        $.notify('please upload the image via "change image" button before saving', 'warn');
                    }

                    return;
                }

            },
            validateSKU_stripe: function(sku){
                let $vm = this;

                $.ajax({
                    url: '/backend/scripts/validate_sku.php',
                    type: 'post',
                    data: {
                        sku_id: sku
                    },
                    success: function(data){
                        let $data = JSON.parse(data);

                        switch ($data.status.code) {
                            case (101 || '101'):
                                $vm.upload.validSKU = true;
                                $vm.showUpload = true;

                                $('.image-sku-input').css({'box-shadow': '0 0 4px forestgreen'});
                                $('.alert-success-sku').fadeIn();
                                $('#alert-sku-success-msg').html($data.data.msg);

                                $('.browse').removeClass('disabled');

                                $('.add-sku-button').html('ADD SKU IMAGES');
                                break;
                            case (404 || '404'):
                                $('.image-sku-input').css({'box-shadow': '0 0 4px #f7eeca'});
                                $('.alert-sku').fadeIn();
                                $('#alert-sku-msg').html($data.data.msg);

                                setTimeout(function(){
                                    $('.alert-sku').fadeOut();
                                }, 3500);
                                break;
                            default:

                        }
                    },
                    error: function(){

                    }
                })
            },
            validateSkuID: function(val){
                let skuprefix = val.split('_')[0];
                if (skuprefix === 'sku') {
                    return true;
                }else {
                    return false;
                }
            },
            validateCategory: function(val){
                let validCatgories = ['livingroom', 'kitchen', 'bedroom', 'bath'],
                    nospaceCat = val.split(' ').join('');
                for (var i = 0; i < validCatgories.length; i++) {
                    if (validCatgories[i] === nospaceCat) {
                        return [true, nospaceCat];
                    }

                    if (i === validCatgories.length) {
                        return [false];
                    }
                }
            },
            showUploadBox: function(e){
                let $vm = this;

                if ($vm.showUpload) {
                    let file = $('.file');
                    file.trigger('click');
                }else {
                    return;
                }
            },
            singleUpload: function(){
                let $vm = this,
                    upload = $('#singleUpload');

                if ($vm.singleUploadStatus) {
                    upload.trigger('click');
                }else {
                    return;
                }
            },
            slideShowImageUpload: function(){
                let $vm = this,
                    upload = $('#slideImageUpload');

                upload.trigger('click');
            },
            addSkuImages: function(){
                let $vm = this;

                if (!$vm.upload.validSKU) {

                    let skuID_validate = this.upload.files.sku_parent;

                    // validate SKU WITH STRIPE VIA AJAX
                    skuID_validate = skuID_validate.trim();
                    $vm.validateSKU_stripe(skuID_validate);

                    return;
                }

                if ($vm.counter.uploadCounter < 4) {
                    $('.alert-total').fadeIn();
                    $('#alert-msg').html('Please upload 4 images before submitting');

                    setTimeout(function(){
                        $('.alert-total').fadeOut();
                    }, 5500);
                    return;
                }


                if ($vm.upload.validSKU) {
                    let skuID_inp = this.upload.files.sku_parent,
                        skuID_status = this.validateSkuID(skuID_inp);


                    // checks to see if entered sku starts with sku_
                    // ajax validates if sku actually exists
                    if (skuID_status) {
                        //show processing data loader to keep user informed
                        $.notify('data sent to server', 'success');

                        // trim any white space off input sku
                        $vm.upload.files.sku_parent = $vm.upload.files.sku_parent.trim();

                        $.ajax({
                            url: '/backend/scripts/add_sku_images_data.php',
                            type: 'post',
                            data:{
                                data: JSON.stringify($vm.upload.files)
                            },
                            success: function(data){
                                console.log(data);
                                let $data = JSON.parse(data);

                                console.log($data);
                                switch ($data.status.code) {
                                    case (101 || '101'):
                                        $.notify($data.data.msg, 'success');
                                        console.log($data.status.sku_request_code);

                                        for (var i = 0; i < $vm.upload.files.images.length; i++) {
                                            $(`.img${i+1}`).css({"background": `url(${$vm.upload.files.images[i]})`, "background-position":'center', "background-size":"cover"});
                                        }

                                        // add success message to COOKIE

                                        Cookies.set('idyl-image-add', `Images added successfully for ${skuID_inp}`);

                                        // refresh page for next image add
                                        setTimeout(function(){
                                            window.location.reload();
                                        }, 2000);

                                        break;
                                    case (404 || '404'):

                                        // sku warning
                                        if ($data.status.sku_request_code === 402) {
                                            $('.image-sku-input').css({'box-shadow': '0 0 4px #f7eeca'});
                                            $('.alert-sku').fadeIn().removeClass('alert-danger').addClass('alert-warning');;
                                            $('#alert-sku-msg').html($data.data.sku_data.error_type);

                                            setTimeout(function(){
                                                $('.alert-sku').fadeOut();
                                            }, 3500);

                                            console.log($data.status.sku_request_code);
                                            console.log($data.data.sku_data.error_type);
                                            return;
                                        }

                                        if ($data.status.sku_request_code === 101) {
                                            $('.image-sku-input').css({'box-shadow': '0 0 4px #f7eeca'});
                                            $('.alert-sku').fadeIn().removeClass('alert-danger').addClass('alert-warning');;
                                            $('#alert-sku-msg').html($data.data.msg);

                                            // setTimeout(function(){
                                            //     $('.alert-sku').fadeOut();
                                            // }, 3500);
                                        }

                                        // $.notify($data.data.msg, 'error');
                                        console.log('404 ERROR');
                                        console.log($data.data.msg);


                                        break;
                                    default:

                                }
                            },
                            error: function(){

                            }

                        })
                    }
                    else {
                        $.notify('Incorrect sku id entered', 'error');

                        $('.image-sku-input').css({'box-shadow': '0 0 4px red'});
                        $('.alert-sku').fadeIn().removeClass('alert-warning').addClass('alert-danger');
                        $('#alert-sku-msg').html('Incorrect sku id entered');

                        setTimeout(function(){
                            $('.alert-sku').fadeOut();
                        }, 3500);
                    }
                }

            },
            cleanImagePath: function(path) {
                let url = path,
                    splitURL = url.split('/');

                for(let i=0; i < splitURL.length; i++){
                    if(splitURL[i] === 'idyldev'){
                        splitURL.splice(0, i+1);
                    }
                }

                return "/"+splitURL.join('/');
            },
            imageTemplateMarkup: function(image){
                let markup = `<div class="col-xs-12 col-md-3">
                    <div class="ci-image-container">
                        <img src="${image}" alt="product image">
                    </div>
                    <div>
                        <p><strong>Link:</strong> https://nordicidyl.com${image}</p>
                    </div>
                </div>`;

                return markup;
            },
            changeSlideData: function(e){

                if ($(e.target).hasClass('disabled')) {
                    console.log('please upload the added image');
                }else {
                    let $vm = this,
                        imageData = $vm.slideshowUpload.upload.allImages,
                        newImage = $vm.slideshowUpload.upload.newimage_address,
                        delete_image = $vm.slideshowUpload.upload.oldimage_address,
                        slideTitle = $('#slide-title')[0].value,
                        slideContent = $('#slide-content')[0].value,
                        btnText = $('#slide-btn-txt')[0].value,
                        btnLink = $('#slide-btn-link')[0].value,
                        pos = $('#slideModal').attr('data-index');

                    // console.log(slideTitle);
                    // console.log($('#slide-title'));

                    if ($vm.slideshowUpload.counter.uploadCounter > 0) {
                        // edit the imageData array image value & all text data
                        imageData[pos-1].image = newImage;
                        imageData[pos-1].title = slideTitle;
                        imageData[pos-1].content = slideContent;
                        imageData[pos-1].cta.text = btnText
                        imageData[pos-1].cta.link = btnLink;

                        console.log('UPDATE ALL DATA FOR SLIDE');
                        console.log(imageData[pos-1].image);
                        console.log(imageData[pos-1].title);
                    }else {
                        // edit the imageData array text data only as image was not uploaded
                        imageData[pos-1].title = slideTitle;
                        imageData[pos-1].content = slideContent;
                        imageData[pos-1].cta.text = btnText
                        imageData[pos-1].cta.link = btnLink;

                        console.log('UPDATE TEXT NOT IMAGE');
                        console.log(imageData[pos-1].title);
                        console.log(imageData[pos-1].image);
                    }

                    $.ajax({
                        url: '/backend/scripts/edit_slide_data.php',
                        type: 'post',
                        data: {
                            slideData: JSON.stringify(imageData)
                        },
                        success: function(data){
                            let $data = JSON.parse(data);

                            console.log($data);

                            // if success update all values on trigger element
                            switch ($data.status.code) {
                                case (101 || '101'):
                                    if ($vm.slideshowUpload.counter.uploadCounter < 1) {
                                        console.log('CHANGE ONLY TEXT VALUES');
                                        // only update the text values
                                        let ids = [`#title-slide-${pos}`, `#content-slide-${pos}`, `#btntxt-slide-${pos}`, `#btnlink-slide-${pos}`],
                                            values = [slideTitle, slideContent, btnText, btnLink];

                                        for (var i = 0; i < ids.length; i++) {
                                            $(ids[i]).html(values[i]);
                                        }

                                    }else {
                                        console.log('CHANGE ALL VALUES. IMAGE SHOULD CHANGE');
                                        // update all values e.g image included
                                        let ids = [`#title-slide-${pos}`, `#content-slide-${pos}`, `#btntxt-slide-${pos}`, `#btnlink-slide-${pos}`],
                                            values = [slideTitle, slideContent, btnText, btnLink];

                                        for (var i = 0; i < ids.length; i++) {
                                            $(ids[i]).html(values[i]);
                                        }

                                        $(`#image-slide-${pos}`).css({'background':`url(${newImage})`});

                                        let buttonID = $('#slideModal').attr('data-trigger-id');
                                        $(buttonID).attr('data-current-image', newImage);

                                    }

                                    // alert successful change for slide on card/panel
                                    $(`.alert-slide-update-${pos}`).css({'background-color':'#dff0d8'});
                                    $(`.alert-slide-update-${pos}`).fadeIn();
                                    $(`#alert-slide-update-msg-${pos}`).html('slide data updated successfully');

                                    setTimeout(function(){
                                        $(`.alert-slide-update-${pos}`).css({'background-color':'darkgray', 'transition':'all .4s'});
                                    }, 10000)

                                    // close modal
                                    $('#slideModal').modal('hide');

                                    break;
                                case (404 || '404'):
                                    // alert successful change for slide on card/panel
                                    $('.alert-save-error').fadeIn();
                                    $('.alert-save-error-msg').html($data.data.msg);
                                    break;
                                default:

                            }

                        },
                        error: function(){

                        }
                    })

                    console.log('save can be processed');
                }

            }
        },
        mounted: function(){
            let $vm = this;

            // trigger modal functions

            $('.slide-modal-trigger').on('click', function(e){
                let button = $(e.target)[0],
                    buttonID = $(button).attr('id'),
                    slideCurrentImage = $(button).attr('data-current-image'),
                    allSlidesData = JSON.parse($(button).attr('data-slide-data')),
                    pos = $(button).attr('data-index'),
                    slideTitle = $(button).attr('data-title'),
                    slideContent = $(button).attr('data-content'),
                    slideBtnTxt = $(button).attr('data-cta-text'),
                    slideBtnLink = $(button).attr('data-cta-link');

                // elements
                let el_currentImage = $('.curr-image'),
                    el_slideTitle = $('#slide-title'),
                    el_slideContent = $('#slide-content'),
                    el_buttonText = $('#slide-btn-txt'),
                    el_buttonLink = $('#slide-btn-link');


                // add data from triggered button to modal elements
                el_currentImage.attr('src', slideCurrentImage);
                el_slideTitle.attr('value', slideTitle);
                el_slideContent.attr('value', slideContent);
                el_buttonText.attr('value', slideBtnTxt);
                el_buttonLink.attr('value', slideBtnLink);

                // update vue data for images
                $vm.slideshowUpload.upload.allImages = allSlidesData;
                $vm.slideshowUpload.upload.oldimage_address = slideCurrentImage;

                // show modal
                $('#slideModal').modal('show');


                // add attributes to modal
                $('#slideModal').attr('data-index', pos);
                $('#slideModal').attr('data-trigger-id', '#'+buttonID);

            })

            $('#slideModal').on('hide.bs.modal', function(){

                // reset slide upload values
                $vm.slideshowUpload.upload.allImages = '';
                $vm.slideshowUpload.upload.oldimage_address = '';
                $vm.slideshowUpload.upload.newimage_address = '';

                // reset single counter values
                $vm.slideshowUpload.counter.counterTemp = 0;
                $vm.slideshowUpload.counter.uploadCounter = 0;

                //clear modal content
                $('.slide-preview').html('');

                // hide alert if it was shown
                $('.alert-single').fadeOut();
                $('.alert-success-upload').fadeOut();

                // reset progress
                $('#p-bar-slide').css({"width":"2%"});
            });


            $('.modal-trigger').on('click', function(e){
                let sku_id = $(e.target).attr('data-sku'),
                    sku_cat = $(e.target).attr('data-cat'),
                    buttonTriggerID = $(e.target).attr('id'),
                    buttonIndex = $(e.target).attr('data-index'),
                    imagesArr = JSON.parse($(e.target).attr('data-images')),
                    current_images_class = $('.current-images-display'),
                    select_images_class = $('.select-images');

                current_images_class.append('<br>');
                // add images to modal
                for (var i = 0; i < imagesArr.length; i++) {
                    let templateCurrent = $vm.imageTemplateMarkup(imagesArr[i]);
                        // templateChange = $vm.selectImageMarkup(imagesArr[i], i+1);

                    current_images_class.append(templateCurrent);
                    // select_images_class.append(templateChange);
                    $vm.selectedImage.images.push(imagesArr[i]);

                }

                // add data from triggered button to modal
                $('.edit-modal-title').html(sku_id);

                // show modal
                $('#imageEditModal').modal('show');

                // add attributes to modal
                $('#imageEditModal').attr('data-sku', sku_id);
                $('#imageEditModal').attr('data-cat', sku_cat);
                $('#imageEditModal').attr('data-button-trigger', '#'+buttonTriggerID);
                $('#imageEditModal').attr('data-button-index', buttonIndex);

            })

            $('#imageEditModal').on('hide.bs.modal', function(){
                console.log('modal closed');
                let slctImageArr_length = $dashboard_vue.selectedImage.images.length;

                // reset single upload values
                $dashboard_vue.singleUploadStatus = false;
                $dashboard_vue.selectedImage.images.splice(0, slctImageArr_length);
                $dashboard_vue.selectedImage.oldimage_address = '';
                $dashboard_vue.selectedImage.newimage_address = '';
                $dashboard_vue.selectedImage.position = '';

                // reset single counter values
                $dashboard_vue.counter.singleCounter.counter = 0;
                $dashboard_vue.counter.singleCounter.counterTemp = 0;

                // left tab
                $('.edit-modal-title').html('');
                $('.current-images-display').html('');

                // right tab
                $('.select-images').html('');
                $('.single-preview').html('');

                // hide alert if it was shown
                $('.alert-single').fadeOut();

                // reset progress
                $('#p-bar-single').css({'width': '2%'});
            })


            // *******************************************//
            // add blog images upload functionality
            // *******************************************//

            let uploadBlogImagesBtn = $('<button/>')
            .addClass('btn btn-primary changeImage-btn')
            .text('Add Image')
            .on('click', function () {
                console.log('BLOG IMAGE BUTTON');
                var $this = $(this),
                    data = $this.data();

                data.submit().always(function () {

                });
            });

            $('#blogUpload').fileupload({
                url: '/backend/scripts/uploadblogimages.php',
                autoUpload: false,
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator && navigator.userAgent),
                imageMaxWidth: 1200,
                imageMaxHeight: 1200,
                imageCrop: false, // Force cropped images
                previewMaxWidth: 200,
                previewMaxHeight: 200
            }).on('fileuploadadd', function(e, data){
                // makes sure file uploaded is an image
                var filetypeallowed = /.\.(jpg|png|jpeg)$/i,
                    fileName = data.originalFiles,
                    counter = 0;

                console.log(data);

                // console.log("MATCH: " + $match);

                let $match = data.files[0].name.match(filetypeallowed);
                console.log("MATCH: " + $match);
                if (!$match) {
                    console.log('no match');
                    $('.alert-file-error').fadeIn();
                    $('#alert-file-error-msg').html(`${data.files[0].name} does not match valid file types`);

                    setTimeout(function(){
                        $('.alert-file-error').fadeOut();
                    }, 5500);

                    return;
                }else {
                    console.log('match');
                }

                $vm.blogimagesUpload.counter.counterTemp += 1;
                counter = $vm.blogimagesUpload.counter.counterTemp;


                if (counter === $vm.blogimagesUpload.limit) {
                    // show alert with message as to why button is disabled
                    $('.alert-limit').fadeIn();
                    $('#alert-limit-msg').html('Maximum amount of images reached');
                }

                console.log("upload Counter: " + counter);

                // add correct ID's to progress bar and button
                $(uploadBlogImagesBtn).attr('id', `p-button${counter}`);
                console.log($(uploadBlogImagesBtn));

                let $progress = `<br><div class="progress progress-${counter}">
                  <div class="progress-bar progress-bar-striped p-bar" id="p-bar${counter}" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
                    <span class="sr-only">2% Complete</span>
                  </div>
                </div>`;

                data.context = $('<div class="image"/>').appendTo('.pending-uploads');

                localStorage.setItem(`blogupload-buttonID-${counter}`,`#p-button${counter}`);
                localStorage.setItem(`blogupload-progressID-${counter}`,`#p-bar${counter}`);



                $.each(data.files, function (index, file) {
                   var node = $('<div/>')
                           .append($('<p/>').text(file.name));
                   if (!index) {
                       node
                           .append(uploadBlogImagesBtn.clone(true).data(data))
                           .append('<br>')
                           .append($progress);
                   }
                   node.appendTo(data.context);
               });

                // submit form data to server to be validated e.g file size & file exists
                // data.submit();

            }).on('fileuploadprocessalways', function(e, data){

                let filetypeallowed = /.\.(jpg|png|jpeg)$/i,
                    $match = data.files[0].name.match(filetypeallowed);

                if (!$match) {
                    return;
                }

                var index = data.index,
                    file = data.files[index];

                console.log(file.preview);
                node = $(data.context.children()[index]);
                  if (file.preview) {
                      node
                          .prepend('<br>')
                          .prepend(file.preview);
                  }
                  if (file.error) {
                      node
                          .append('<br>')
                          .append($('<span class="text-danger"/>').text(file.error));
                  }

            })
            .on('fileuploaddone', function(e,data){

                console.log(data);
                console.log(JSON.parse(data.result));
                $result = JSON.parse(data.result);

                switch ($result.status.code) {
                    case (101 || '101'):
                        // add one to upload counter
                        // NOTE: this will be used to determine whether to show
                        $vm.blogimagesUpload.counter.uploadCounter += 1;

                        let path = $vm.cleanImagePath($result.data.dir);

                        // let user know that reset button must be pressed by changing its colour
                        if ($vm.blogimagesUpload.counter.uploadCounter === $vm.blogimagesUpload.limit) {
                            $('.reset-btn').css({'background-color':'darkred', 'transition':'all .4s'});
                        }

                        // remove the button
                        setTimeout(function(){
                            let pgressCount = $vm.blogimagesUpload.counter.progressCounter,
                                btnID = '#p-button'+pgressCount;

                            $(btnID).fadeOut();
                        }, 600);


                        break;
                    case (404 || '404'):
                        $.notify($result.data.msg, 'error');

                        let pgressCount = $vm.blogimagesUpload.counter.progressCounter,
                            btnID = '#p-button'+pgressCount;

                        $(btnID).removeClass('btn-success disabled').addClass('btn-danger');
                        $(btnID).text('Error saving image');

                        break;
                    default:

                }


            })
            .on('fileuploadprogressall', function(e,data){
                $vm.blogimagesUpload.counter.progressCounter +=1;

                let progress = parseInt(data.loaded / data.total * 100, 10),
                    pgressCount = $vm.blogimagesUpload.counter.progressCounter,
                    progressID = localStorage.getItem(`blogupload-progressID-${pgressCount}`),
                    buttonID = localStorage.getItem(`blogupload-buttonID-${pgressCount}`);

                console.log(progressID);
                console.log(buttonID);

                $(progressID).css({'width': `${progress}%`});

                if (progress === 100) {
                    $(buttonID).removeClass('btn-primary').addClass('btn-success disabled');
                    $(buttonID).text('Successfully Uploaded');
                }
                // console.log(data);
            });









            // *******************************************//
            // change a slideshow image upload functionality
            // *******************************************//

            let uploadSlideImage = $('<button/>')
            .addClass('btn btn-primary changeImage-btn')
            .text('Change Image')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();

                data.submit().always(function () {

                });
            });

            $('#slideImageUpload').fileupload({
                url: '/backend/scripts/uploadslideimages.php',
                autoUpload: false,
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator && navigator.userAgent),
                imageMaxWidth: 1200,
                imageMaxHeight: 1200,
                imageCrop: false, // Force cropped images
                previewMaxWidth: 200,
                previewMaxHeight: 200
            })
            .on('fileuploadadd', function(e, data){
                // makes sure file uploaded is an image
                var filetypeallowed = /.\.(jpg|png|jpeg)$/i,
                    fileName = data.originalFiles,
                    counter = 0;

                console.log(data);

                // console.log("MATCH: " + $match);

                let $match = data.files[0].name.match(filetypeallowed);
                console.log("MATCH: " + $match);
                if (!$match) {
                    console.log('no match');
                    $('.alert-file-error').fadeIn();
                    $('#alert-file-error-msg').html(`${data.files[0].name} does not match valid file types`);

                    setTimeout(function(){
                        $('.alert-file-error').fadeOut();
                    }, 5500);

                    return;
                }else {
                    console.log('match');
                }

                $vm.slideshowUpload.counter.counterTemp += 1;
                counter = $vm.slideshowUpload.counter.counterTemp;


                if (counter === $vm.slideshowUpload.upload.limit) {
                    // disable browse files button
                    // $('.browse').addClass('disabled');
                    // $vm.showUpload = false;

                    // show alert with message as to why button is disabled
                    $('.alert-single').fadeIn();
                    $('#alert-single-msg').html('Maximum amount of images reached');
                }

                if (counter > 0) {
                    $('.save-slide-changes').addClass('disabled');
                }

                console.log("upload Counter: " + counter);

                // add correct ID's to progress bar and button
                // $(uploadSingle).attr('id', `p-button${counter}`);

                let $progress = `<br><div class="progress progress-slide">
                  <div class="progress-bar progress-bar-striped p-bar" id="p-bar-slide" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
                    <span class="sr-only">2% Complete</span>
                  </div>
                </div>`;

                data.context = $('<div class="image"/>').appendTo('.slide-preview');


                $.each(data.files, function (index, file) {
                   var node = $('<div/>')
                           .append($('<p/>').text(file.name));
                   if (!index) {
                       node
                           .append(uploadSlideImage.clone(true).data(data))
                           .append('<br>')
                           .append($progress);
                   }
                   node.appendTo(data.context);
               });

                // submit form data to server to be validated e.g file size & file exists
                // data.submit();

            })
            .on('fileuploadprocessalways', function(e, data){

                let filetypeallowed = /.\.(jpg|png|jpeg)$/i,
                    $match = data.files[0].name.match(filetypeallowed);

                if (!$match) {
                    return;
                }

                var index = data.index,
                    file = data.files[index];

                console.log(file.preview);
                node = $(data.context.children()[index]);
                  if (file.preview) {
                      node
                          .prepend('<br>')
                          .prepend(file.preview);
                  }
                  if (file.error) {
                      node
                          .append('<br>')
                          .append($('<span class="text-danger"/>').text(file.error));
                  }

            })
            .on('fileuploaddone', function(e,data){

                console.log(data);
                console.log(JSON.parse(data.result));
                $result = JSON.parse(data.result);

                switch ($result.status.code) {
                    case (101 || '101'):
                        // add one to upload counter
                        // NOTE: this will be used to determine whether to show
                        $vm.slideshowUpload.counter.uploadCounter += 1;

                        let path = $vm.cleanImagePath($result.data.dir);

                        // add the returned directory to array
                        $vm.slideshowUpload.upload.newimage_address = path;

                        // remove the button
                        setTimeout(function(){
                            $('.changeImage-btn').fadeOut();
                        }, 600);

                        // un-disable save button
                        $('.save-slide-changes').removeClass('disabled');

                        // show alert success message
                        $('.alert-success-upload').fadeIn();
                        $('#alert-success-upload-msg').html('Image uploaded successfully. Please click save to confirm changes');

                        break;
                    case (404 || '404'):
                        $.notify($result.data.msg, 'error');

                        break;
                    default:

                }


            })
            .on('fileuploadprogressall', function(e,data){

                let progress = parseInt(data.loaded / data.total * 100, 10),
                    pgressCount = $vm.counter.progressCounter,
                    progressID = '#p-bar-slide',
                    buttonID = '.changeImage-btn';

                $(progressID).css({'width': `${progress}%`});

                if (progress === 100) {
                    $(buttonID).removeClass('btn-primary').addClass('btn-success disabled');
                    $(buttonID).text('Successfully Uploaded');
                }
                // console.log(data);
            });








            // *******************************************//
            // change a product image upload functionality
            // *******************************************//

            let uploadSingle = $('<button/>')
            .addClass('btn btn-primary changeImage-btn')
            .text('Change Image')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();

                data.submit().always(function () {

                });
            });

            $('#singleUpload').fileupload({
                url: '/backend/scripts/uploadimages.php',
                autoUpload: false,
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator && navigator.userAgent),
                imageMaxWidth: 1200,
                imageMaxHeight: 1200,
                imageCrop: true, // Force cropped images
                previewMaxWidth: 200,
                previewMaxHeight: 200
            })
            .on('fileuploadadd', function(e, data){
                // makes sure file uploaded is an image
                var filetypeallowed = /.\.(jpg|png|jpeg)$/i,
                    fileName = data.originalFiles,
                    counter = 0;

                console.log(data);

                // console.log("MATCH: " + $match);

                let $match = data.files[0].name.match(filetypeallowed);
                console.log("MATCH: " + $match);
                if (!$match) {
                    console.log('no match');
                    $('.alert-file-error').fadeIn();
                    $('#alert-file-error-msg').html(`${data.files[0].name} does not match valid file types`);

                    setTimeout(function(){
                        $('.alert-file-error').fadeOut();
                    }, 5500);

                    return;
                }else {
                    console.log('match');
                }

                $vm.counter.singleCounter.counterTemp += 1;
                counter = $vm.counter.singleCounter.counterTemp;


                if (counter === $vm.counter.singleCounter.limit) {
                    // disable browse files button
                    // $('.browse').addClass('disabled');
                    // $vm.showUpload = false;

                    // show alert with message as to why button is disabled
                    $('.alert-single').fadeIn();
                    $('#alert-single-msg').html('Maximum amount of images reached');
                }

                console.log("upload Counter: " + counter);

                // add correct ID's to progress bar and button
                // $(uploadSingle).attr('id', `p-button${counter}`);

                let $progress = `<br><div class="progress progress-single">
                  <div class="progress-bar progress-bar-striped p-bar" id="p-bar-single" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
                    <span class="sr-only">2% Complete</span>
                  </div>
                </div>`;

                data.context = $('<div class="image"/>').appendTo('.single-preview');


                $.each(data.files, function (index, file) {
                   var node = $('<div/>')
                           .append($('<p/>').text(file.name));
                   if (!index) {
                       node
                           .append(uploadSingle.clone(true).data(data))
                           .append('<br>')
                           .append($progress);
                   }
                   node.appendTo(data.context);
               });

                // submit form data to server to be validated e.g file size & file exists
                // data.submit();

            })
            .on('fileuploadprocessalways', function(e, data){

                let filetypeallowed = /.\.(jpg|png|jpeg)$/i,
                    $match = data.files[0].name.match(filetypeallowed);

                if (!$match) {
                    return;
                }

                var index = data.index,
                    file = data.files[index];

                console.log(file.preview);
                node = $(data.context.children()[index]);
                  if (file.preview) {
                      node
                          .prepend('<br>')
                          .prepend(file.preview);
                  }
                  if (file.error) {
                      node
                          .append('<br>')
                          .append($('<span class="text-danger"/>').text(file.error));
                  }

            })
            .on('fileuploaddone', function(e,data){

                console.log(data);
                console.log(JSON.parse(data.result));
                $result = JSON.parse(data.result);

                switch ($result.status.code) {
                    case (101 || '101'):
                        // add one to upload counter
                        // NOTE: this will be used to determine whether to show
                        $vm.counter.singleCounter.counter += 1;

                        let path = $vm.cleanImagePath($result.data.dir);

                        // add the returned directory to array
                        $vm.selectedImage.newimage_address = path;

                        // remove the button
                        setTimeout(function(){
                            $('.changeImage-btn').fadeOut();
                        }, 600);

                        break;
                    case (404 || '404'):
                        $.notify($result.data.msg, 'error');

                        break;
                    default:

                }


            })
            .on('fileuploadprogressall', function(e,data){

                let progress = parseInt(data.loaded / data.total * 100, 10),
                    pgressCount = $vm.counter.progressCounter,
                    progressID = '#p-bar-single',
                    buttonID = '.changeImage-btn';

                $(progressID).css({'width': `${progress}%`});

                if (progress === 100) {
                    $(buttonID).removeClass('btn-primary').addClass('btn-success disabled');
                    $(buttonID).text('Successfully Uploaded');
                }
                // console.log(data);
            });














            // *******************************************//
            // upload product images functionality
            // *******************************************//

            uploadButton = $('<button/>')
            .addClass('btn btn-primary upload-button')
            .text('Upload Image')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();

                data.submit().always(function () {

                });
            });

            $('#fileUpload').fileupload({
                url: '/backend/scripts/uploadimages.php',
                autoUpload: false,
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator && navigator.userAgent),
                imageMaxWidth: 1200,
                imageMaxHeight: 1200,
                imageCrop: true, // Force cropped images
                previewMaxWidth: 200,
                previewMaxHeight: 200
            })
            .on('fileuploadadd', function(e, data){
                // makes sure file uploaded is an image
                var filetypeallowed = /.\.(jpg|png|jpeg)$/i,
                    fileName = data.originalFiles,
                    counter = 0;

                console.log(data);

                // console.log("MATCH: " + $match);

                let $match = data.files[0].name.match(filetypeallowed);
                console.log("MATCH: " + $match);
                if (!$match) {
                    console.log('no match');
                    $.notify(`${data.files[0].name} does not match valid file types`, 'error');
                    return;
                }else {
                    console.log('match');
                }

                $vm.counter.uploadtempCounter += 1;
                counter = $vm.counter.uploadtempCounter;


                if (counter === $vm.upload.limit) {
                    // disable browse files button
                    $('.browse').addClass('disabled');
                    $vm.showUpload = false;

                    // show alert with message as to why button is disabled
                    $('.alert-total').fadeIn();
                    $('#alert-msg').html('Maximum amount of images reached');
                }

                console.log("upload Counter: " + counter);

                // add correct ID's to progress bar and button
                $(uploadButton).attr('id', `p-button${counter}`);

                let $progress = `<br><div class="progress progress-${counter}">
                  <div class="progress-bar progress-bar-striped p-bar" id="p-bar${counter}" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
                    <span class="sr-only">2% Complete</span>
                  </div>
                </div>`;

                data.context = $('<div class="image"/>').appendTo('.pending-uploads');
                localStorage.setItem(`upload-progressID-${counter}`,`#p-bar${counter}`);
                localStorage.setItem(`upload-buttonID-${counter}`,`#p-button${counter}`);

               $.each(data.files, function (index, file) {
                   var node = $('<div/>')
                           .append($('<p/>').text(file.name));
                   if (!index) {
                       node
                           .append(uploadButton.clone(true).data(data))
                           .append($progress);
                   }
                   node.appendTo(data.context);
               });

                // submit form data to server to be validated e.g file size & file exists
                // data.submit();

            })
            .on('fileuploadprocessalways', function(e, data){

                let filetypeallowed = /.\.(jpg|png|jpeg)$/i,
                    $match = data.files[0].name.match(filetypeallowed);

                if (!$match) {
                    return;
                }

                var index = data.index,
                    file = data.files[index];

                console.log(file.preview);
                node = $(data.context.children()[index]);
                  if (file.preview) {
                      node
                          .prepend('<br>')
                          .prepend(file.preview);
                  }
                  if (file.error) {
                      node
                          .append('<br>')
                          .append($('<span class="text-danger"/>').text(file.error));
                  }
                // $('.img1').css({'background':`url(${file.preview})`});

            })
            .on('fileuploaddone', function(e,data){

                $('.upload-button').on('click', function(e){
                    console.log(e);
                })

                console.log(e);
                console.log(data);
                console.log(JSON.parse(data.result));
                $result = JSON.parse(data.result);
                switch ($result.status.code) {
                    case (101 || '101'):
                        // add one to upload counter
                        // NOTE: this will be used to determine whether to show
                        $vm.counter.uploadCounter += 1;

                        let path = $vm.cleanImagePath($result.data.dir);

                        // add the returned directory to array
                        $vm.upload.files.images.push(path);

                        break;
                    case (404 || '404'):
                        $.notify($result.data.msg, 'error');

                        break;
                    default:

                }
            })
            .on('fileuploadprogressall', function(e,data){
                $vm.counter.progressCounter += 1;

                let progress = parseInt(data.loaded / data.total * 100, 10),
                    pgressCount = $vm.counter.progressCounter,
                    progressID = localStorage.getItem(`upload-progressID-${pgressCount}`),
                    buttonID = localStorage.getItem(`upload-buttonID-${pgressCount}`);

                $(progressID).css({'width': `${progress}%`});

                if (progress === 100) {
                    $(buttonID).removeClass('btn-primary').addClass('btn-success disabled');
                    $(buttonID).text('Successfully Uploaded');
                }
                // console.log(data);
            });
        }
    })



    // components

    Vue.component('select-image', {
        data: function() {
            return {
                status: 'component connected'
            }
        },
        template: `<div class="image-select-box" data-selected="false" :data-pos="sposition" :data-image="simage" :style="'background: url('+simage+'); background-size: cover; backgroud-position: center'" @click="getSelectedDetails"> </div>`,
        props: ['simage', 'sposition'],
        methods: {
            getSelectedDetails: function(e){
                let targetImage = $(e.target)[0],
                    select_image_info = $dashboard_vue.selectedImage,
                    selectBoxes = document.querySelectorAll('.image-select-box');

                console.log(targetImage);

                // check if values in selectedImage.postion or oldimage_address match clicked image

                /*
                    - if true remove class selected from image
                        - change single upload back to false
                        - clear position & oldimage_address values
                    - else add selected class to clicked image
                        - change single upload to true
                        - update position & oldimage_address values
                */

                if (select_image_info.position === targetImage.attributes['data-pos'].value) {

                    console.log('UNSELECTED');
                    select_image_info.position = '';
                    select_image_info.oldimage_address = '';

                    $(targetImage).removeClass('selected-image');

                    // set browse functionality to false
                    $dashboard_vue.singleUploadStatus = false;


                }else {
                    console.log('SELECTED');

                    for (var i = 0; i < selectBoxes.length; i++) {
                        if ($(selectBoxes[i]).hasClass('selected-image')) {
                            $(selectBoxes[i]).removeClass('selected-image');
                        }
                    }

                    select_image_info.position = targetImage.attributes['data-pos'].value;
                    select_image_info.oldimage_address = targetImage.attributes['data-image'].value;

                    $(targetImage).addClass('selected-image');

                    // set browse functionality to true
                    $dashboard_vue.singleUploadStatus = true;
                }
            }
        }
    })




    // *******************************************//
    // custom watchers
    // *******************************************//

    $dashboard_vue.$watch('counter.singleCounter.counter', function(newVal, oldVal){
        if (newVal > 0) {
            $('.save-image-change').removeClass('disabled');
            $('.browse2').addClass('disabled');
            // $dashboard_vue.singleUploadStatus = false;
        }else {
            $('.save-image-change').addClass('disabled');
        }
    })

    $dashboard_vue.$watch('blogimagesUpload.counter.counterTemp', function(newVal, oldVal){
        if (newVal === $dashboard_vue.blogimagesUpload.limit) {
            $('.browse').addClass('disabled');
        }else if(newVal < $dashboard_vue.blogimagesUpload.limit) {
            if ($('.browse').hasClass('disabled')) {
                $('.browse').removeClass('disabled');
            }
        }
    })



    Vue.component('category-list-item', {
        data: function(){
            return{
                status: 'components works'
            }
        },
        template: `<li></li>`,
        props: [],
        methods: {

        }

    })





    // create posts vue instance

    if (window.location.pathname.split('/')[5] === 'create-blog-posts' || window.location.pathname.split('/')[5] === 'blogpost') {


        let $blog_vue = new Vue({
            el: '.blog-vue',
            data:{
                status: 'create post vue connected',
                instance: createBlogPost
            },
            watch: {

            },
            methods: {
                countCharacters: function (e) {
                    let targetField = $(e.target)[0],
                        fieldValue = targetField.value,
                        fieldVal_count = fieldValue.split('').length;

                    if (fieldVal_count <= 200) {
                        $('#length-count').css({'color':'forestgreen'});
                    }else {
                        $('#length-count').css({'color':'darkred'});
                    }

                    $('#length-count').html(fieldVal_count);
                },
                selectCategory: function(e){
                    let button = $(e.target)[0],
                        catID = $(button).attr('data-cat-id'),
                        inputBox = $('.cat-input-box');

                    // console.log(button.innerHTML);
                    inputBox.attr('value', button.innerHTML);
                    inputBox.attr('data-cat-id', catID);

                    // console.log(inputBox);

                },
                copyPath: function(e){
                    let button = $(e.target)[0],
                        labelID = $(button).attr('data-label-id'),
                        index = $(button).attr('data-loop-index');




                    var pathname = document.querySelector(`#path-${index}`);

                    // console.log(emailLink);
                      var range = document.createRange();
                      range.selectNode(pathname);
                      window.getSelection().addRange(range);

                      try {
                        // Now that we've selected the anchor text, execute the copy command
                        var successful = document.execCommand('copy');

                        $(labelID).fadeIn();
                        setTimeout(function(){
                            $(labelID).fadeOut();
                        }, 2500)

                      } catch(err) {
                          $(labelID).html('error copying path');
                          $(labelID).removeClass('btn-success').addClass('btn-danger');

                          $(labelID).fadeIn();
                          setTimeout(function(){
                              $(labelID).fadeOut();
                          }, 2500)
                      }

                },
                saveDraft: function(e){
                    // get all data that needs to be saved
                    let catID = $('.cat-input-box').attr('data-cat-id'),
                        postMainImage = $('.main-image-inp')[0].value,
                        postTitle = $('.post-title-inp')[0].value,
                        postBrief = $('.post-brief-inp')[0].value,
                        dateCreated = Date.now(),
                        dateModified = Date.now(),
                        datePublished = 'N/A',
                        postBody = '',
                        postStatus = "draft",
                        postID = $(e.target).attr('data-post-id')?$(e.target).attr('data-post-id'):false;

                        console.log(postID);

                    if (!postID) {
                        postBody = createBlogPost.value();
                    }else {
                        postBody = editBlogPost.value();
                    }


                    if (!catID || !postMainImage || !postTitle || !postBrief) {

                        if (!catID) {
                            $('.cat-input-box').css({'box-shadow':'0 0 5px red', 'transition':'all .5s'});

                            setTimeout(function(){
                                $('.cat-input-box').css({'box-shadow':'0 0 0px red'});
                            }, 3000);
                        }

                        if (!postMainImage) {
                            $('.main-image-inp').css({'box-shadow':'0 0 5px red', 'transition':'all .5s'});

                            setTimeout(function(){
                                $('.main-image-inp').css({'box-shadow':'0 0 0px red'});
                            }, 3000);
                        }

                        if (!postTitle) {
                            $('.post-title-inp').css({'box-shadow':'0 0 5px red', 'transition':'all .5s'});

                            setTimeout(function(){
                                $('.post-title-inp').css({'box-shadow':'0 0 0px red'});
                            }, 3000);
                        }

                        if (!postBrief) {
                            $('.post-brief-inp').css({'box-shadow':'0 0 5px red', 'transition':'all .5s'});

                            setTimeout(function(){
                                $('.post-brief-inp').css({'box-shadow':'0 0 0px red'});
                            }, 3000);
                        }

                        // notify generic error
                        $.notify('Some required fields are empty. Please fill with required information', 'error');

                        return;
                    }
                    else {

                        // use data to construct a blog post using BlogPost class
                        let post = new BlogPost(catID, postMainImage, postTitle, postBrief, postBody, postStatus, dateCreated, dateModified, datePublished);

                        console.log(post);

                        if (!postID) {
                            // post ID will be generated on server side
                            // send request to save blog post
                            $.ajax({
                                url: '/backend/scripts/save_blog_post.php',
                                type: 'post',
                                data: {
                                    type: 'draft',
                                    blogpost: post
                                },
                                success: function(data){
                                    let $data = JSON.parse(data);

                                    switch ($data.status.code) {
                                        case (101 || '101'):
                                            // remove local storage data for simple mde field
                                            localStorage.removeItem('smde_createnewPost');

                                            // refresh page so all data is reset.
                                            window.location.reload();
                                            break;
                                        case (404 || '404'):
                                            $.notify($data.data.msg, 'error');
                                            break;
                                        default:

                                    }
                                },
                                error: function(){
                                    $.notify('error saving post', 'error');
                                }
                            })
                        }
                        else {
                            // send request to save & update blog post
                            $.ajax({
                                url: '/backend/scripts/save_blog_post.php',
                                type: 'post',
                                data: {
                                    type: 'draft',
                                    blogpost_id: postID,
                                    blogpost: post
                                },
                                success: function(data){
                                    let $data = JSON.parse(data);

                                    switch ($data.status.code) {
                                        case (101 || '101'):
                                            // remove local storage data for simple mde field
                                            localStorage.removeItem('smde_editcurrentPost');

                                            // refresh page so all data is reset.
                                            window.location.reload();
                                            break;
                                        case (404 || '404'):
                                            $.notify($data.data.msg, 'error');
                                            break;
                                        default:

                                    }
                                },
                                error: function(){
                                    $.notify('error saving post', 'error');
                                }
                            })
                        }


                    }

                },
                savePublish: function(e){
                    // get all data that needs to be saved
                    let catID = $('.cat-input-box').attr('data-cat-id'),
                        postMainImage = $('.main-image-inp')[0].value,
                        postTitle = $('.post-title-inp')[0].value,
                        postBrief = $('.post-brief-inp')[0].value,
                        postBody = '',
                        dateCreated = Date.now(),
                        dateModified = Date.now(),
                        datePublished = Date.now(),
                        postStatus = "published",
                        postID = $(e.target).attr('data-post-id')?$(e.target).attr('data-post-id'):false;

                        console.log(postID);

                    if (!postID) {
                        postBody = createBlogPost.value();
                    }else {
                        postBody = editBlogPost.value();
                    }


                    if (!catID || !postMainImage || !postTitle || !postBrief) {

                        if (!catID) {
                            $('.cat-input-box').css({'box-shadow':'0 0 5px red', 'transition':'all .5s'});

                            setTimeout(function(){
                                $('.cat-input-box').css({'box-shadow':'0 0 0px red'});
                            }, 3000);
                        }

                        if (!postMainImage) {
                            $('.main-image-inp').css({'box-shadow':'0 0 5px red', 'transition':'all .5s'});

                            setTimeout(function(){
                                $('.main-image-inp').css({'box-shadow':'0 0 0px red'});
                            }, 3000);
                        }

                        if (!postTitle) {
                            $('.post-title-inp').css({'box-shadow':'0 0 5px red', 'transition':'all .5s'});

                            setTimeout(function(){
                                $('.post-title-inp').css({'box-shadow':'0 0 0px red'});
                            }, 3000);
                        }

                        if (!postBrief) {
                            $('.post-brief-inp').css({'box-shadow':'0 0 5px red', 'transition':'all .5s'});

                            setTimeout(function(){
                                $('.post-brief-inp').css({'box-shadow':'0 0 0px red'});
                            }, 3000);
                        }

                        // notify generic error
                        $.notify('Some required fields are empty. Please fill with required information', 'error');

                        return;
                    }else {

                        // use data to construct a blog post using BlogPost class
                        let post = new BlogPost(catID, postMainImage, postTitle, postBrief, postBody, postStatus, dateCreated, dateModified, datePublished);

                        console.log(post);

                        if (!postID) {
                            // post ID will be generated on server side
                            // send request to save blog post
                            $.ajax({
                                url: '/backend/scripts/save_blog_post.php',
                                type: 'post',
                                data: {
                                    type: 'publish',
                                    blogpost: post
                                },
                                success: function(data){
                                    let $data = JSON.parse(data);

                                    switch ($data.status.code) {
                                        case (101 || '101'):
                                            // remove local storage data for simple mde field
                                            localStorage.removeItem('smde_createnewPost');

                                            // refresh page so all data is reset.
                                            window.location.reload();
                                            break;
                                        case (404 || '404'):
                                            $.notify($data.data.msg, 'error');
                                            break;
                                        default:

                                    }
                                },
                                error: function(){
                                    $.notify('error saving post', 'error');
                                }
                            })
                        }else {
                            // send request to save & update blog post
                            $.ajax({
                                url: '/backend/scripts/save_blog_post.php',
                                type: 'post',
                                data: {
                                    type: 'publish',
                                    blogpost_id: postID,
                                    blogpost: post
                                },
                                success: function(data){
                                    let $data = JSON.parse(data);

                                    switch ($data.status.code) {
                                        case (101 || '101'):
                                            // remove local storage data for simple mde field
                                            localStorage.removeItem('smde_editcurrentPost');

                                            // refresh page so all data is reset.
                                            window.location.reload();
                                            break;
                                        case (404 || '404'):
                                            $.notify($data.data.msg, 'error');
                                            break;
                                        default:

                                    }
                                },
                                error: function(){
                                    $.notify('error saving post', 'error');
                                }
                            })
                        }


                    }
                }

            },
            mounted: function(){


            }


        });
    }



    /* //////////////////////////////////////////////////////// */
    /* //////////////////////////////////////////////////////// */

    // CREATE BLOG POST MARKDOWN EDITOR

    /* //////////////////////////////////////////////////////// */
    /* //////////////////////////////////////////////////////// */

    if (window.location.pathname.split('/')[5] === 'create-blog-posts') {
        var createBlogPost = new SimpleMDE({
            autofocus: true,
            element: document.getElementById("createPost"),
            spellChecker: false,
            hideIcons: ["guide"],
            placeholder: "Blog post content here..",
            autosave: {
                enabled: true,
                uniqueId: "createnewPost",
                delay: 2000,
            },
            insertTexts: {
                horizontalRule: ["", "\n\n-----\n\n"],
                image: ["![](http://", ")"],
                link: ["[", "](http://)"],
                table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
            },
            renderingConfig: {
                singleLineBreaks: true,
                codeSyntaxHighlighting: true,
            }
        });

        // console.log(createBlogPost.value());
    }


    /* //////////////////////////////////////////////////////// */
    /* //////////////////////////////////////////////////////// */

    // EDIT BLOG POST MARKDOWN EDITOR

    /* //////////////////////////////////////////////////////// */
    /* //////////////////////////////////////////////////////// */



    if (window.location.pathname.split('/')[5] === 'blogpost') {
        var editBlogPost = new SimpleMDE({
            autofocus: true,
            element: document.getElementById("editPost"),
            spellChecker: false,
            hideIcons: ["guide"],
            placeholder: "Blog post content here..",
            autosave: {
                enabled: true,
                uniqueId: "editcurrentPost",
                delay: 2000,
            },
            insertTexts: {
                horizontalRule: ["", "\n\n-----\n\n"],
                image: ["![](http://", ")"],
                link: ["[", "](http://)"],
                table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
            },
            renderingConfig: {
                singleLineBreaks: true,
                codeSyntaxHighlighting: true,
            }
        });

        const getBlogPostContent = ()=>{
            let id = window.location.pathname.split('/')[6].trim(),
                tbl = 'blog',
                field = 'post_id',
                type = 'retrieve',
                content = new getPageContent(type, tbl, field, id),
                editors = [editBlogPost];

            console.log(id);
            content.configEditorVar(editors);
            content.markdown(false, 'blog_body');
        }


        getBlogPostContent();

        // console.log(createBlogPost.value());
    }









    /* //////////////////////////////////////////////////////// */

    // GET CONTENT FUNCTIONS TO POPULATE MARKDOWN EDITORS

    /* //////////////////////////////////////////////////////// */


    /* //////////////////////////////////////////////////////// */
    // SINGLE PAGE EDITORS
    /* //////////////////////////////////////////////////////// */


    const getStoryContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [storyContent];


        content.configEditorVar(editors);
        content.markdown(false, 'page_markdown');
    }

    const getTermscondContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [termsconContent];


        content.configEditorVar(editors);
        content.markdown(false, 'page_markdown');
    }

    const getPrivacypolContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [privacypolContent];


        content.configEditorVar(editors);
        content.markdown(false, 'page_markdown');
    }

    /* //////////////////////////////////////////////////////// */
    // MULTI PAGE EDITORS
    /* //////////////////////////////////////////////////////// */

    const getShippingContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [shippingContentq1, shippingContentq2, shippingContentq3, shippingContentq4, shippingContentq5];


        content.configEditorVar(editors);
        content.markdown(false, 'page_markdown');
    }

    const getReturnsContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [returnContentq1, returnContentq2, returnContentq3, returnContentq4];


        content.configEditorVar(editors);
        content.markdown(false, 'page_markdown');
    }

    const getPaymentsContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [paymentContentq1, paymentContentq2, paymentContentq3, paymentContentq4];


        content.configEditorVar(editors);
        content.markdown(false, 'page_markdown');
    }

    const getOrdersContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [orderContentq1, orderContentq2, orderContentq3, orderContentq4];


        content.configEditorVar(editors);
        content.markdown(false, 'page_markdown');
    }

    /* //////////////////////////////////////////////////////// */

    // CLICK FUNCTIONS USED TO SAVE MARKDOWN IN DATABASE

    /* //////////////////////////////////////////////////////// */

    $('.control-content').on('click', function(e){
        let targetButton = $(e.target)[0],
            buttonType = targetButton.attributes['data-action'].value,
            mdownInstance = targetButton.attributes['data-instance'].value,
            $id = window.location.pathname.split('/')[6],
            $markdown = window[mdownInstance].value();

        console.log(targetButton);
        console.log(buttonType);
        console.log($id);
        console.log($markdown);

        let markdownArray = [$markdown];


        $.ajax({
            url: '/backend/scripts/content-controls.php',
            type: 'post',
            data: {
                type: buttonType,
                table: 'pages',
                id: $id,
                field: 'page_id',
                markdown: JSON.stringify(markdownArray)
            },
            success: function(data){
                let $results = JSON.parse(data);

                switch ($results.status.code) {
                    case (101 || '101'):
                        $.notify('Content has been saved and updated successfully', 'success');

                        // style the button to reflect save success
                        $(targetButton).removeClass('btn-primary').addClass('btn-success');
                        $(targetButton).css({'box-shadow':'0 0 5px forestgreen'});
                        $(targetButton).html('Content saved successfully');

                        //timeout to reset button styling
                        setTimeout(function(){
                            $(targetButton).removeClass('btn-success').addClass('btn-primary');
                            $(targetButton).css({'box-shadow':'0 0 0 forestgreen'});
                            $(targetButton).html('Save');

                        }, 2000);

                        break;
                    case (404 || '404'):
                        $.notify('Content not saved. Try again or contact help', 'error');

                        // style the button to reflect error
                        $(targetButton).removeClass('btn-primary').addClass('btn-danger');
                        $(targetButton).css({'box-shadow':'0 0 5px darkred'});
                        $(targetButton).html('Error saving content');

                        //timeout to reset button styling
                        setTimeout(function(){
                            $(targetButton).removeClass('btn-danger').addClass('btn-primary');
                            $(targetButton).css({'box-shadow':'0 0 0 darkred'});
                            $(targetButton).html('Save');

                        }, 2000);
                        break;
                    default:

                }
            },
            error: function(){

            }
        })
    })

    $('.control-content-multi').on('click', function(e){
        let targetButton = $(e.target)[0],
            buttonType = targetButton.attributes['data-action'].value,
            $id = window.location.pathname.split('/')[6],
            test = 'shippingContentq1',
            $mde_textareas = document.querySelectorAll('.mde-textarea'),
            markdownArray = [];


        for (let i = 0; i < $mde_textareas.length; i++) {
            let mde_varname = $mde_textareas[i].attributes['data-v-title'].value;
            markdownArray.push(window[mde_varname].value());
        }

        console.log(targetButton);
        console.log(buttonType);
        console.log($id);

        console.log("------------");
        console.log(markdownArray);
        console.log(JSON.stringify(markdownArray));

        $.ajax({
            url: '/backend/scripts/content-controls.php',
            type: 'post',
            data: {
                type: buttonType,
                table: 'pages',
                id: $id,
                field: 'page_id',
                markdown: JSON.stringify(markdownArray)
            },
            success: function(data){
                let $results = JSON.parse(data);

                switch ($results.status.code) {
                    case (101 || '101'):
                        $.notify('Content has been saved and updated successfully', 'success');

                        // style the button to reflect save success
                        $(targetButton).removeClass('btn-primary').addClass('btn-success');
                        $(targetButton).css({'box-shadow':'0 0 5px forestgreen'});
                        $(targetButton).html('Content saved successfully');

                        //timeout to reset button styling
                        setTimeout(function(){
                            $(targetButton).removeClass('btn-success').addClass('btn-primary');
                            $(targetButton).css({'box-shadow':'0 0 0 forestgreen'});
                            $(targetButton).html('Save');

                        }, 2000);
                        break;
                    case (404 || '404'):
                        $.notify('Content not saved. Try again or contact help', 'error');

                        // style the button to reflect error
                        $(targetButton).removeClass('btn-primary').addClass('btn-danger');
                        $(targetButton).css({'box-shadow':'0 0 5px darkred'});
                        $(targetButton).html('Error saving content');

                        //timeout to reset button styling
                        setTimeout(function(){
                            $(targetButton).removeClass('btn-danger').addClass('btn-primary');
                            $(targetButton).css({'box-shadow':'0 0 0 darkred'});
                            $(targetButton).html('Save');

                        }, 2000);
                        break;
                    default:

                }
            },
            error: function(){

            }
        })
    })


    /* //////////////////////////////////////////////////////// */

    // CHECKS WHAT FUNCTION TO RUN BASED ON PAGE

    /* //////////////////////////////////////////////////////// */


    function checkPage() {
        console.log('CHECK PAGE RUN');
        let page = window.location.pathname.split('/')[6];

        switch (page) {
            case '8f003a39e5':
                getStoryContent();
                break;
            case '97cc350c5e':
                console.log('RUN SHIPPING FUNCTION TO GET MDE CONTENT');
                getShippingContent();
                break;
            case 'ed8c8f347e':
                console.log('RUN RETURNS FUNCTION TO GET MDE CONTENT');
                getReturnsContent();
                break;
            case '5d4b314e6d':
                console.log('RUN PAYMENTS FUNCTION TO GET MDE CONTENT');
                getPaymentsContent();
                break;
            case '649b879831':
                console.log('RUN ORDERS FUNCTION TO GET MDE CONTENT');
                getOrdersContent();
                break;
            case 'e7b6d56e22':
                console.log('RUN TERMS & COND FUNCTION TO GET MDE CONTENT');
                getTermscondContent();
                break;
            case 'b77bf5106e':
                console.log('RUN PRIVACY POLICY FUNCTION TO GET MDE CONTENT');
                getPrivacypolContent();
                break;
            default:

        }
    }

    checkPage();

})
