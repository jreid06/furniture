(function() {
    'use strict';
    // this function is strict...
}());

$(document).ready(function() {

    console.log('settings is connected');

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
                                link: "/backend/auth/admin/edit/all-products"
                            },
                            {
                                title: "Livingroom Products",
                                link: "/backend/auth/admin/edit/livingroom-products"
                            },
                            {
                                title: 'Kitchen Products',
                                link: "/backend/auth/admin/edit/kitchen-products"
                            },
                            {
                                title: 'Bedroom Products',
                                link: "/backend/auth/admin/edit/bedroom-products"
                            },
                            {
                                title: 'Bath Products',
                                link: "/backend/auth/admin/edit/bath-products"
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
                uploadCounter: 0
            },
            upload:{
                limit: 4,
                files:{
                    sku_parent: '',
                    category: 'not-in-use',
                    images: []
                },
                deletedNums:[]
            },
            showUpload: true
        },
        watch: {

        },
        computed: {

        },
        methods: {
            dashhome: function(){
                window.location = '/';
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
            addSkuImages: function(){

                let skuID_inp = this.upload.files.sku_parent,
                    skuID_status = this.validateSkuID(skuID_inp),
                    $vm = this;

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
                                    // setTimeout(function(){
                                    //     window.location.reload();
                                    // }, 2000);

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

                                        setTimeout(function(){
                                            $('.alert-sku').fadeOut();
                                        }, 3500);
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
                }else {
                    $.notify('Incorrect sku id entered', 'error');

                    $('.image-sku-input').css({'box-shadow': '0 0 4px red'});
                    $('.alert-sku').fadeIn().removeClass('alert-warning').addClass('alert-danger');
                    $('#alert-sku-msg').html('Incorrect sku id entered');

                    setTimeout(function(){
                        $('.alert-sku').fadeOut();
                    }, 3500);
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
            }

        },
        mounted: function(){
            let $vm = this;


            // upload product images functionality

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
                url: '/backend/scripts/uploadimages-test.php',
                autoUpload: false,
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator && navigator.userAgent),
                imageMaxWidth: 1200,
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
                    $vm.showUpload =  false;

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
                // $('.img1').css({'background':`url(${file.preview})`});

            }).on('fileuploaddone', function(e,data){

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
            }).on('fileuploadprogressall', function(e,data){
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

    // custom watchers

    $dashboard_vue.$watch('counter.uploadCounter', function(newVal, oldVal){
        console.log(newVal);
        if (newVal === 4) {
            $('.field-cover').css({"opacity":"0"});
            $('#submitImages').removeClass('disabled');

            setTimeout(function(){
                $('.field-cover').css({"z-index":"-1"});
            }, 550);
        }else {

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
