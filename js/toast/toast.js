/**
 * Created by arun on 5/10/16.
 * arunjayakumar07@gmail.com
 */



function addCSSRule(sheet, selector, rules, index) {
    try{
        if ("insertRule" in sheet) {
            sheet.insertRule(selector + "{" + rules + "}", index);
        }
        else if ("addRule" in sheet) {
            sheet.addRule(selector, rules, index);
        }
    }
    catch(e){
        console.log(e);
    }

}

function initToast() {

    try{



        var html = '<div class="error">' +
            '<div class="error_left">' +
            '<div class="error_outer"></div>' +
            '<div class="error_inner"></div>' +
            '</div>' +
            '<div class="error_right">' +
            'Oops! Something went wrong' +
            '</div>' +
            '</div>'
        ;

        $('body').append(html);

        var style = document.createElement("style");
        style.appendChild(document.createTextNode(""));
        document.head.appendChild(style);
        var sheet = document.styleSheets[0];
        addCSSRule(sheet,
            '.empty_error_text',
            'text-align: center;' +
            'font-size: 12px;' +
            'color: #e74c3c;' +
            'font-weight: bold;' +
            'opacity: 0;' +
            '-webkit-transition: all 0.3s;-moz-transition: all 0.3s;-ms-transition: all 0.3s;-o-transition: all 0.3s;transition: all 0.3s;'
        );

        addCSSRule(sheet,
            '.empty_error_text.show',
            ' opacity: 1;'
        );

        sheet.insertRule(
            '@-webkit-keyframes error {' +
            '0%   {' +
            '-webkit-transform: scale(1);-moz-transform: scale(1);-ms-transform: scale(1);-o-transform: scale(1);transform: scale(1);' +
            '}' +
            '50%{' +
            '-webkit-transform: scale(1.1);-moz-transform: scale(1.1);-ms-transform: scale(1.1);-o-transform: scale(1.1);transform: scale(1.1);' +
            '}' +
            '100% {' +
            '-webkit-transform: scale(1);-moz-transform: scale(1);-ms-transform: scale(1);-o-transform: scale(1);transform: scale(1);' +
            '}' +
            '}',
            1
        );


        sheet.insertRule(
            "@keyframes error{ " +
            "0%   {" +
            "-webkit-transform: scale(1);-moz-transform: scale(1);-ms-transform: scale(1);-o-transform: scale(1);transform: scale(1);" +
            "}" +
            "50%{ " +
            "-webkit-transform: scale(1.1);-moz-transform: scale(1.1);-ms-transform: scale(1.1);-o-transform: scale(1.1);transform: scale(1.1);" +
            "} " +
            "100% { " +
            "-webkit-transform: scale(1);-moz-transform: scale(1);-ms-transform: scale(1);-o-transform: scale(1);transform: scale(1);" +
            "} " +
            "} ",
            2
        );

        addCSSRule(sheet,
            '.error',
            'position: fixed;' +
            'bottom: 20px;' +
            'left: 20px;' +
            'z-index: 3000;' +
            'display: none;'
        );

        addCSSRule(sheet,
            '.error_left',
            'display: inline-block;' +
            'position: relative;' +
            'width: 44px;' +
            'height: 55px;' +
            'vertical-align: middle;'
        );

        addCSSRule(sheet,
            '.error_outer',
            'position: absolute;' +
            'width: 50px;' +
            'height: 50px;' +
            'border-radius: 50%;' +
            'background-color: rgba(254, 113, 91, 0.68);' +
            '-webkit-animation: error 1s infinite;' +
            'animation: error 1s infinite;'
        );

        addCSSRule(sheet,
            '.error_inner',
            'position: absolute;' +
            'width: 30px;' +
            'height: 30px;' +
            'border-radius: 50%;' +
            'background: #FE715B url("http://imgur.com/download/8HPeCj6") no-repeat center;' +
            'background-size: 15px;' +
            'top: 10px;' +
            'left: 10px;'
        );

        addCSSRule(sheet,
            '.error_right',
            'display: inline-block;' +
            'vertical-align: middle;' +
            'background-color: #FE715B;' +
            'color: #Fff;' +
            'font-size: 12px;' +
            'padding: 3px 20px;' +
            'position: relative;'
        );

        addCSSRule(sheet,
            '.error_right:before',
            'content: \'\';' +
            'position: absolute;' +
            'width: 0;' +
            'height: 0;' +
            'left: -7px;' +
            'border-top: 7px solid transparent;' +
            'border-bottom: 7px solid transparent;' +
            'border-right: 7px solid #FE715B;' +
            'top: 5px;'
        );

        addCSSRule(sheet,
            '.success .error_outer',
            'background-color: rgba(128, 187, 80, 0.7);'
        );

        addCSSRule(sheet,
            '.success .error_inner',
            'background-image: url("http://imgur.com/download/HxkisKF");'
        );

        addCSSRule(sheet,
            '.success .error_inner, .success .error_right',
            ' background-color: #7EBD4D;'
        );

        addCSSRule(sheet,
            '.success .error_right:before',
            '  border-right: 7px solid #7EBD4D;'
        );


        addCSSRule(sheet,
            '.loader .error_outer',
            '  background-color: rgba(4, 154, 213, 0.7);'
        );

        addCSSRule(sheet,
            '.loader .error_inner',
            'background-image: url("http://imgur.com/download/pE6u31C");'
        );

        addCSSRule(sheet,
            '.loader .error_inner, .loader .error_right',
            ' background-color: #049AD5;'
        );

        addCSSRule(sheet,
            '.loader .error_right:before ',
            'border-right: 7px solid #049AD5;'
        );

        sheet.insertRule(
            '@-webkit-keyframes error_left {' +
            '0%   {' +
            'opacity: 0;' +
            '-webkit-transform: scale(0.5);' +
            '-moz-transform: scale(0.5);' +
            '-ms-transform: scale(0.5);' +
            '-o-transform: scale(0.5);' +
            'transform: scale(0.5);' +
            '}' +
            '100% {' +
            'opacity: 1;' +
            '-webkit-transform: scale(1);-moz-transform: scale(1);-ms-transform: scale(1);-o-transform: scale(1);transform: scale(1);' +
            '}' +
            '}',
            3
        );

        sheet.insertRule(
            '@keyframes error_left {' +
            '0%   {' +
            'opacity: 0;' +
            '-webkit-transform: scale(0.5);' +
            '-moz-transform: scale(0.5);' +
            '-ms-transform: scale(0.5);' +
            '-o-transform: scale(0.5);' +
            'transform: scale(0.5);' +
            '}' +
            '100% {' +
            'opacity: 1;' +
            '-webkit-transform: scale(1);-moz-transform: scale(1);-ms-transform: scale(1);-o-transform: scale(1);transform: scale(1);' +
            '}' +
            '}',
            4
        );


        sheet.insertRule(
            '@-webkit-keyframes error_right {' +
            '0%   {' +
            'opacity: 0;' +
            '-webkit-transform: translateX(-50px);' +
            'transform: translateX(-50px);' +
            '}' +
            '100% {' +
            'opacity: 1;' +
            '-webkit-transform: translateX(0px);-moz-transform: translateX(0px);-ms-transform: translateX(0px);-o-transform: translateX(0px);transform: translateX(0px); ' +
            '}' +
            '}',
            5
        );

        sheet.insertRule(

            '@keyframes error_right {' +
            '0%   {' +
            'opacity: 0;' +
            '-webkit-transform: translateX(-50px);' +
            'transform: translateX(-50px);' +
            '}' +
            '100% {' +
            'opacity: 1;' +
            '-webkit-transform: translateX(0px);-moz-transform: translateX(0px);-ms-transform: translateX(0px);-o-transform: translateX(0px);transform: translateX(0px);' +
            '}' +
            '}',
            6
        );


        addCSSRule(sheet,
            '.error.show',
            'display: block;'
        );

        addCSSRule(sheet,
            '.error.show .error_left',
            '-webkit-animation: error_left 0.3s;' +
            'animation: error_left 0.3s;'
        );

        addCSSRule(sheet,
            '.error.show .error_right',
            '-webkit-animation: error_right 0.3s;' +
            'animation: error_right 0.3s;'
        );


    }
    catch(e){
        console.log(e);
    }

}


function showError(msg, type, hide) {

    try{


        $('.error').attr('class', 'error');
        $('.error .error_right').html(msg);

        switch (type) {
            case 'success':
                $('.error').addClass('success');
                break;
            case 'error':
                break;
            case 'loading':
                $('.error').addClass('loader');
                break;
        }

        $('.error').addClass('show');

        if (hide) {
            setTimeout(function () {
                $('.error').attr('class', 'error');
            }, 2000);
        }

    }
    catch(e){
        console.log(e);
    }
}
function hideError() {
    try{
        $('.error').attr('class', 'error');
    }
    catch(e){
        console.log(e);
    }
}


window.onload = initToast();