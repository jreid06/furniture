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
                        link: "/backend/auth/admin/edit/homepage-edit",
                        sublinks: false
                    },
                    {
                        title: 'Our Story Content',
                        link: "/backend/auth/admin/edit/ourstory-edit/8f003a39e5",
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
                                title: "All / Uncategorized Products",
                                link: "/backend/auth/admin/edit/products/all"
                            },
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
            selectedImage:{
                images: [],
                position: '',
                oldimage_address: '',
                newimage_address: ''
            },
            dashboardhome:{
                panels:[
                    {
                        id: 'home',
                        title: 'Edit Home slideshow content',
                        multiple_links: false,
                        link: ''
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
            dashhome: function(){
                window.location = '/';
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
            }
        },
        mounted: function(){
            let $vm = this;

            // trigger modal functions

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

            }).on('fileuploaddone', function(e,data){

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


            }).on('fileuploadprogressall', function(e,data){

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

    $dashboard_vue.$watch('counter.progressCounter', function(newVal, oldVal){
        console.log(newVal);
    })













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
        content.markdown();
    }

    const getTermscondContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [termsconContent];


        content.configEditorVar(editors);
        content.markdown();
    }

    const getPrivacypolContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [privacypolContent];


        content.configEditorVar(editors);
        content.markdown();
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
        content.markdown();
    }

    const getReturnsContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [returnContentq1, returnContentq2, returnContentq3, returnContentq4];


        content.configEditorVar(editors);
        content.markdown();
    }

    const getPaymentsContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [paymentContentq1, paymentContentq2, paymentContentq3, paymentContentq4];


        content.configEditorVar(editors);
        content.markdown();
    }

    const getOrdersContent = ()=>{
        let id = window.location.pathname.split('/')[6],
            tbl = 'pages',
            field = 'page_id',
            type = 'retrieve',
            content = new getPageContent(type, tbl, field, id),
            editors = [orderContentq1, orderContentq2, orderContentq3, orderContentq4];


        content.configEditorVar(editors);
        content.markdown();
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
                markdown: JSON.stringify(markdownArray)
            },
            success: function(data){
                let $results = JSON.parse(data);

                console.log($results);
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
                markdown: JSON.stringify(markdownArray)
            },
            success: function(data){
                let $results = JSON.parse(data);

                console.log($results);
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
