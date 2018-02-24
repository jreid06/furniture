(function() {
    'use strict';
    // this function is strict...
}());

$(document).ready(function() {

    console.log('settings is connected');

    let $dashboard_vue = new Vue({
        el: '.dash-vue',
        data:{
            status: 'dashboard vue connected'
        },
        watch: {

        },
        computed: {

        },
        methods: {
            dashhome: function(){
                window.location = '/';
            }
        },
        mounted: function(){

        }
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